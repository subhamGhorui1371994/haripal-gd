<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MandatoryDisclosureDocuments;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class DisclosureDocumentsController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('adminAfterLogin');
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $breadcrumb_title = 'Documents';

        return view('admin.mandatory-disclosure.document.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function document_list_ajax(Request $request)
    {
        $limit = $offset = 0;

        $order_column_by = $order_column = $search = '';

        if (isset($request->start)) {
            $offset = $request->start;
        }
        if (isset($request->length)) {
            $limit = $request->length;
        }

        if (isset($request->order[0])) {
            if (isset($request->order[0]['dir'])) {
                $order_column_by = $request->order[0]['dir'];
            }
        }

        if (isset($request->order[0])) {
            if (isset($request->order[0]['column'])) {
                if ($request->order[0]['column'] == 0) {
                    $order_column = 'title';
                } elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'file_link';
                } elseif ($request->order[0]['column'] == 2) {
                    $order_column = 'created_at';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = MandatoryDisclosureDocuments::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $details['recordsTotal'],
            "recordsFiltered" => $details['recordsTotal'],
            "data" => $details['data'],
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $breadcrumb_title = 'Documents';

        return view('admin.mandatory-disclosure.document.add', compact('breadcrumb_title'));
    }

    /**
     * @param $documents
     * @return Application|Factory|View
     */
    public function edit($documents)
    {
        $breadcrumb_title = 'Documents';
        $documents = MandatoryDisclosureDocuments::find($documents);

        return view('admin.mandatory-disclosure.document.edit', compact('breadcrumb_title', 'documents'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validate_value['title'] = $request->post('title');
        $validate_rule['title'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect('admin/mandatory-disclosure/documents/create')->withErrors(implode(', ', $validation_errors));
        } else {

            $documents_file = $request->file('file_link');

            if ($documents_file) {
                $fileName = 'HCE-DOCUMENT-' . time() . '.' . $documents_file->extension();
                $documents_file->move(public_path('uploads/mandatory-disclosure/documents/'), $fileName);
                $documents_file = 'uploads/mandatory-disclosure/documents/' . $fileName;
            } else {
                return redirect('admin/mandatory-disclosure/documents/create')->withErrors('Please select a file.');
            }

            $documents = new MandatoryDisclosureDocuments();
            $documents->fill([
                'title' => $request->post('title'),
                'file_link' => $documents_file ?? null,
            ]);
            $documents->save();

            return redirect('admin/mandatory-disclosure/documents')->withSuccess('Document added successfully.');
        }
    }

    /**
     * @param $documents
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update($documents, Request $request)
    {
        $validate_value['title'] = $request->post('title');
        $validate_rule['title'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {
            $documents = MandatoryDisclosureDocuments::find($documents);

            $documents->title = $request->post('title');
            $documents->updated_at = date('Y-m-d H:i:s');

            $documents_file = $request->file('file_link');

            if ($documents_file) {
                $fileName = 'HCE-DOCUMENT-' . time() . '.' . $documents_file->extension();
                $documents_file->move(public_path('uploads/mandatory-disclosure/documents/'), $fileName);
                if (file_exists(public_path($documents->file_link))) {
                    unlink(public_path($documents->file_link));
                }
                $documents->file_link = 'uploads/mandatory-disclosure/documents/' . $fileName;
            }

            $documents->save();

            return redirect('admin/mandatory-disclosure/documents')->withSuccess('Document updated successfully.');
        }
    }

    /**
     * @param $id
     * @param MandatoryDisclosureDocuments $documents
     * @return mixed
     */
    public function destroy($id, MandatoryDisclosureDocuments $documents)
    {
        $documents->destroy($id);

        return redirect()->back()->withSuccess('Document deleted successfully!!');
    }
}
