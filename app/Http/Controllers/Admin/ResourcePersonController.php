<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResourcePerson;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class ResourcePersonController extends Controller
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
        $breadcrumb_title = 'Resource Person';

        return view('admin.resource-person.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function person_list_ajax(Request $request)
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
                    $order_column = 'name';
                } elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'resource_person_type';
                } elseif ($request->order[0]['column'] == 2) {
                    $order_column = 'name';
                } elseif ($request->order[0]['column'] == 3) {
                    $order_column = 'email';
                } elseif ($request->order[0]['column'] == 4) {
                    $order_column = 'mobile';
                } elseif ($request->order[0]['column'] == 5) {
                    $order_column = 'salary';
                } elseif ($request->order[0]['column'] == 6) {
                    $order_column = 'created_at';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = ResourcePerson::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

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
        $breadcrumb_title = 'Resource Person';
        $resourcePersonTypes = ['' => 'Select Type', 'Teaching Staff' => 'Teaching Staff', 'Non Teaching Staff' => 'Non Teaching Staff', 'Administrative' => 'Administrative'];

        return view('admin.resource-person.add', compact('breadcrumb_title', 'resourcePersonTypes'));
    }

    /**
     * @param $resourcePerson
     * @return Application|Factory|View
     */
    public function edit($resourcePerson)
    {
        $breadcrumb_title = 'Resource Person';
        $resourcePersonTypes = ['' => 'Select Type', 'Teaching Staff' => 'Teaching Staff', 'Non Teaching Staff' => 'Non Teaching Staff', 'Administrative' => 'Administrative'];

        return view('admin.resource-person.edit', compact('breadcrumb_title', 'resourcePerson', 'resourcePersonTypes'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validate_value['resource_person_type'] = $request->post('resource_person_type');
        $validate_rule['resource_person_type'] = 'required';
        $validate_value['name'] = $request->post('name');
        $validate_rule['name'] = 'required';
        $validate_value['email'] = $request->post('email');
        $validate_rule['email'] = 'required|email';
        $validate_value['mobile'] = $request->post('mobile');
        $validate_rule['mobile'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect('admin/resource-person/create')->withErrors(implode(', ', $validation_errors));
        } else {

            $resource_person_type = $request->post('resource_person_type');
            $selectedCourses = $request->post('course') ?? [];

            if($resource_person_type === 'Teaching Staff') {
                if(empty($selectedCourses)) {
                    return redirect()->back()->withErrors('If the resource person is teaching staff then course field is required. Please select at least one course.');
                }
            }

            $createData = [
                'resource_person_type' => $resource_person_type,
                'name' => $request->post('name'),
                'email' => $request->post('email') ?? 'NA',
                'mobile' => $request->post('mobile') ?? 'NA',
                'experience' => $request->post('experience') ?? 'NA',
                'designation' => $request->post('designation') ?? 'NA',
                'qualification' => $request->post('qualification') ?? 'NA',
                'salary' => $request->post('salary') ?? 'NA',
                'course' => json_encode($selectedCourses),
                'bed' => in_array('bed', $selectedCourses),
                'dled' => in_array('dled', $selectedCourses),
            ];

            $resourcePersonImage = $request->file('photo');

            if ($resourcePersonImage) {
                if (!in_array($resourcePersonImage->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
                    return redirect()->back()->withErrors('Please select only image file.');
                }
                $fileName = str_replace(' ', '-', strtolower($createData['name'])) . '-image-' . time() . '.' . $resourcePersonImage->extension();
                $resourcePersonImage->move(public_path('uploads/resource-person/'), $fileName);
                $createData['photo'] = 'uploads/resource-person/' . $fileName;
            } else {
                $createData['photo'] = 'assets/img/blank-profile-picture.png';
            }

            $resourcePerson = new ResourcePerson();
            $resourcePerson->fill($createData);
            $resourcePerson->save();

            return redirect('admin/resource-person')->withSuccess('New image added successfully.');
        }
    }

    /**
     * @param ResourcePerson $resourcePerson
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(ResourcePerson $resourcePerson, Request $request)
    {
        $validate_value['resource_person_type'] = $request->post('resource_person_type');
        $validate_rule['resource_person_type'] = 'required';
        $validate_value['name'] = $request->post('name');
        $validate_rule['name'] = 'required';
        $validate_value['email'] = $request->post('email');
        $validate_rule['email'] = 'required|email';
        $validate_value['mobile'] = $request->post('mobile');
        $validate_rule['mobile'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {

            $resource_person_type = $request->post('resource_person_type');
            $selectedCourses = $request->post('course') ?? [];

            if($resource_person_type === 'Teaching Staff') {
                if(empty($selectedCourses)) {
                    return redirect()->back()->withErrors('If the resource person is teaching staff then course field is required. Please select at least one course.');
                }
            }

            $updateData = [
                'resource_person_type' => $resource_person_type,
                'name' => $request->post('name'),
                'email' => $request->post('email') ?? 'NA',
                'mobile' => $request->post('mobile') ?? 'NA',
                'experience' => $request->post('experience') ?? 'NA',
                'designation' => $request->post('designation') ?? 'NA',
                'qualification' => $request->post('qualification') ?? 'NA',
                'salary' => $request->post('salary') ?? 'NA',
                'course' => json_encode($selectedCourses),
                'bed' => in_array('bed', $selectedCourses),
                'dled' => in_array('dled', $selectedCourses),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $resourcePersonImage = $request->file('photo');

            if ($resourcePersonImage) {
                if (!in_array($resourcePersonImage->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
                    return redirect()->back()->withErrors('Please select only image file.');
                }
                $fileName = str_replace(' ', '-', strtolower($updateData['name'])) . '-image-' . time() . '.' . $resourcePersonImage->extension();
                $resourcePersonImage->move(public_path('uploads/resource-person/'), $fileName);
                $updateData['photo'] = 'uploads/resource-person/' . $fileName;
                if(file_exists(public_path($resourcePerson->photo))) {
                    unlink(public_path($resourcePerson->photo));
                }
            }

            $resourcePerson->fill($updateData);
            $resourcePerson->save();

            return redirect('admin/resource-person')->withSuccess('Resource person updated successfully.');
        }
    }

    /**
     * @param $id
     * @param ResourcePerson $resourcePerson
     * @return mixed
     */
    public function destroy($id, ResourcePerson $resourcePerson)
    {
        $resourcePerson->destroy($id);

        return redirect()->back()->withSuccess('Resource person deleted successfully!!');
    }
}
