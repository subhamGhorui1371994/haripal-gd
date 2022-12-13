<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class GalleryCategoryController extends Controller
{
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
        $breadcrumb_title = 'Gallery Category';

        return view('admin.gallery.category.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function categories_list_ajax(Request $request)
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
                    $order_column = 'created_at';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = GalleryCategory::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

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
        $breadcrumb_title = 'Add Gallery Category';

        return view('admin.gallery.category.add', compact('breadcrumb_title'));
    }

    /**
     * @param $galleryCategory
     * @return Application|Factory|View
     */
    public function edit($galleryCategory)
    {
        $breadcrumb_title = 'Edit Gallery Category';

        return view('admin.gallery.category.edit', compact('breadcrumb_title', 'galleryCategory'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validate_value['category_name'] = $request->post('category_name');
        $validate_rule['category_name'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect('admin/gallery-category/create')->withErrors(implode(', ', $validation_errors));
        } else {

            $galleryCategory = new GalleryCategory();
            $galleryCategory->fill([
                'name' => $request->post('category_name'),
            ]);
            $galleryCategory->save();

            return redirect('admin/gallery-category')->withSuccess('Gallery category created successfully.');
        }
    }

    /**
     * @param GalleryCategory $galleryCategory
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(GalleryCategory $galleryCategory, Request $request)
    {
        $validate_value['category_name'] = $request->post('category_name');
        $validate_rule['category_name'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {

            $updateColumns = [
                'name' => $request->post('category_name'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $galleryCategory->fill($updateColumns);
            $galleryCategory->save();

            return redirect('admin/gallery-category')->withSuccess('Gallery category updated successfully.');
        }
    }

    /**
     * @param $id
     * @param GalleryCategory $galleryCategory
     * @return mixed
     */
    public function destroy($id, GalleryCategory $galleryCategory)
    {
        $galleryCategory->destroy($id);

        return redirect()->back()->withSuccess('Gallery category deleted successfully!!');
    }
}
