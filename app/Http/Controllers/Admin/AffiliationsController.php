<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Affiliations;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class AffiliationsController extends Controller
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
        $breadcrumb_title = 'Affiliations';

        return view('admin.affiliations.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function affiliations_list_ajax(Request $request)
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
                    $order_column = 'logo';
                } elseif ($request->order[0]['column'] == 2) {
                    $order_column = 'link';
                } elseif ($request->order[0]['column'] == 3) {
                    $order_column = 'created_at';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = Affiliations::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

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
        $breadcrumb_title = 'Add Affiliation';

        return view('admin.affiliations.add', compact('breadcrumb_title'));
    }

    /**
     * @param $affiliations
     * @return Application|Factory|View
     */
    public function edit($affiliations)
    {
        $breadcrumb_title = 'Edit Affiliation';
        $affiliations = Affiliations::find($affiliations);

        return view('admin.affiliations.edit', compact('breadcrumb_title', 'affiliations'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validate_value['logo'] = $request->file('logo');
        $validate_rule['logo'] = 'required';
        $validate_value['title'] = $request->post('title');
        $validate_rule['title'] = 'required';
        $validate_value['link'] = $request->post('link');
        $validate_rule['link'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect('admin/affiliations/create')->withErrors(implode(', ', $validation_errors));
        } else {

            $affiliations_file = $request->file('logo');

            if ($affiliations_file) {
                if (!in_array($affiliations_file->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
                    return redirect()->back()->withErrors('Please select only image file.');
                }
                $fileName = 'HCE-AFFILIATION-' . time() . '.' . $affiliations_file->extension();
                $affiliations_file->move(public_path('uploads/affiliations/'), $fileName);
                $affiliations_file = 'uploads/affiliations/' . $fileName;
            }

            $affiliations = new Affiliations();
            $affiliations->fill([
                'title' => $request->post('title'),
                'link' => $request->post('link'),
                'logo' => $affiliations_file ?? null,
            ]);
            $affiliations->save();

            return redirect('admin/affiliations')->withSuccess('Affiliation added successfully.');
        }
    }

    /**
     * @param $affiliations
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update($affiliations, Request $request)
    {
        $validate_value['title'] = $request->post('title');
        $validate_rule['title'] = 'required';
        $validate_value['link'] = $request->post('link');
        $validate_rule['link'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {

            $affiliations = Affiliations::find($affiliations);

            $updateColumns = [
                'title' => $request->post('title'),
                'link' => $request->post('link'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $affiliations_file = $request->file('logo');

            if ($affiliations_file) {
                if (!in_array($affiliations_file->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
                    return redirect()->back()->withErrors('Please select only image file.');
                }
                $fileName = 'HCE-AFFILIATION-' . time() . '.' . $affiliations_file->extension();
                $affiliations_file->move(public_path('uploads/affiliations/'), $fileName);
                $updateColumns['logo'] = 'uploads/affiliations/' . $fileName;
                if (file_exists(public_path($affiliations->logo))) {
                    unlink(public_path($affiliations->logo));
                }
            }

            $affiliations->fill($updateColumns);
            $affiliations->save();

            return redirect('admin/affiliations')->withSuccess('Affiliation updated successfully.');
        }
    }

    /**
     * @param $id
     * @param Affiliations $affiliations
     * @return mixed
     */
    public function destroy($id, Affiliations $affiliations)
    {
        $affiliations->destroy($id);

        return redirect()->back()->withSuccess('Affiliation deleted successfully!!');
    }
}
