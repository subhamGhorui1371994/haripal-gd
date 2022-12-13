<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class NoticeController extends Controller
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
        $breadcrumb_title = 'Notice';

        return view('admin.notice.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function notice_list_ajax(Request $request)
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
                    $order_column = 'date';
                } elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'title';
                } elseif ($request->order[0]['column'] == 2) {
                    $order_column = 'description';
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

        $details = Notice::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

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
        $breadcrumb_title = 'Add Notice';

        return view('admin.notice.add', compact('breadcrumb_title'));
    }

    /**
     * @param $notice
     * @return Application|Factory|View
     */
    public function edit($notice)
    {
        $breadcrumb_title = 'Edit Notice';

        return view('admin.notice.edit', compact('breadcrumb_title', 'notice'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validate_value['date'] = $request->post('date');
        $validate_rule['date'] = 'required';
        $validate_value['title'] = $request->post('title');
        $validate_rule['title'] = 'required';
        $validate_value['description'] = $request->post('description');
        $validate_rule['description'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect('admin/notice/create')->withErrors(implode(', ', $validation_errors));
        } else {

            $notice_file = $request->file('notice_file');

            if ($notice_file) {
                $fileName = 'HCE-NOTICE-' . time() . '.' . $notice_file->extension();
                $notice_file->move(public_path('uploads/notice/'), $fileName);
                $notice_file = 'uploads/notice/' . $fileName;
            }

            $notice = new Notice();
            $notice->fill([
                'date' => date('Y-m-d', strtotime($request->post('date'))),
                'title' => $request->post('title'),
                'description' => $request->post('description'),
                'file' => $notice_file ?? null,
            ]);
            $notice->save();

            return redirect('admin/notice')->withSuccess('Notice added successfully.');
        }
    }

    /**
     * @param Notice $notice
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Notice $notice, Request $request)
    {
        $validate_value['date'] = $request->post('date');
        $validate_rule['date'] = 'required';
        $validate_value['title'] = $request->post('title');
        $validate_rule['title'] = 'required';
        $validate_value['description'] = $request->post('description');
        $validate_rule['description'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {

            $updateColumns = [
                'date' => date('Y-m-d', strtotime($request->post('date'))),
                'title' => $request->post('title'),
                'description' => $request->post('description'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $notice_file = $request->file('notice_file');

            if ($notice_file) {
                $fileName = 'HCE-NOTICE-' . time() . '.' . $notice_file->extension();
                $notice_file->move(public_path('uploads/notice/'), $fileName);
                $updateColumns['file'] = 'uploads/notice/' . $fileName;
                if(file_exists(public_path($notice->file))) {
                    unlink(public_path($notice->file));
                }
            }

            $notice->fill($updateColumns);
            $notice->save();

            return redirect('admin/notice')->withSuccess('Notice updated successfully.');
        }
    }

    /**
     * @param $id
     * @param Notice $notice
     * @return mixed
     */
    public function destroy($id, Notice $notice)
    {
        $notice->destroy($id);

        return redirect()->back()->withSuccess('Notice deleted successfully!!');
    }
}
