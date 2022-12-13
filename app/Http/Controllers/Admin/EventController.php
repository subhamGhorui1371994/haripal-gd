<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
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
        $breadcrumb_title = 'Event';

        return view('admin.event.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function event_list_ajax(Request $request)
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

        $details = Event::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

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
        $breadcrumb_title = 'Add Event';

        return view('admin.event.add', compact('breadcrumb_title'));
    }

    /**
     * @param $event
     * @return Application|Factory|View
     */
    public function edit($event)
    {
        $breadcrumb_title = 'Edit Event';

        return view('admin.event.edit', compact('breadcrumb_title', 'event'));
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
            return redirect('admin/event/create')->withErrors(implode(', ', $validation_errors));
        } else {

            $event_file = $request->file('event_file');

            if ($event_file) {
                if (!in_array($event_file->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
                    return redirect()->back()->withErrors('Please select only image file.');
                }
                $fileName = 'HCE-EVENT-' . time() . '.' . $event_file->extension();
                $event_file->move(public_path('uploads/event/'), $fileName);
                $event_file = 'uploads/event/' . $fileName;
            }

            $event = new Event();
            $event->fill([
                'date' => date('Y-m-d', strtotime($request->post('date'))),
                'title' => $request->post('title'),
                'description' => $request->post('description'),
                'social_site_link' => $request->post('social_site_link') ?? null,
                'image' => $event_file ?? null,
            ]);
            $event->save();

            return redirect('admin/event')->withSuccess('Event added successfully.');
        }
    }

    /**
     * @param Event $event
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Event $event, Request $request)
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
                'social_site_link' => $request->post('social_site_link') ?? null,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $event_file = $request->file('event_file');

            if ($event_file) {
                if (!in_array($event_file->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
                    return redirect()->back()->withErrors('Please select only image file.');
                }
                $fileName = 'HCE-EVENT-' . time() . '.' . $event_file->extension();
                $event_file->move(public_path('uploads/event/'), $fileName);
                $updateColumns['image'] = 'uploads/event/' . $fileName;
                if (file_exists(public_path($event->file))) {
                    unlink(public_path($event->file));
                }
            }

            $event->fill($updateColumns);
            $event->save();

            return redirect('admin/event')->withSuccess('Event updated successfully.');
        }
    }

    /**
     * @param $id
     * @param Event $event
     * @return mixed
     */
    public function destroy($id, Event $event)
    {
        $event->destroy($id);

        return redirect()->back()->withSuccess('Event deleted successfully!!');
    }
}
