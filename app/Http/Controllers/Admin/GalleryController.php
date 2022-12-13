<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
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
        $breadcrumb_title = 'Gallery';

        return view('admin.gallery.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function gallery_list_ajax(Request $request)
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
                    $order_column = 'category_name';
                } elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'created_at';
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

        $details = Gallery::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

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
        $breadcrumb_title = 'Add Gallery Image';
        $galleryCategory = GalleryCategory::pluck('name', 'id')->all();

        return view('admin.gallery.add', compact('breadcrumb_title', 'galleryCategory'));
    }

    /**
     * @param $gallery
     * @return Application|Factory|View
     */
    public function edit($gallery)
    {
        $breadcrumb_title = 'Edit Gallery';
        $galleryCategory = GalleryCategory::pluck('name', 'id')->all();

        return view('admin.gallery.edit', compact('breadcrumb_title', 'gallery', 'galleryCategory'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validate_value['category_name'] = $request->post('category_id');
        $validate_rule['category_name'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect('admin/gallery/create')->withErrors(implode(', ', $validation_errors));
        } else {

            $gallery_image = $request->file('gallery_image');

            if ($gallery_image) {
                if (!in_array($gallery_image->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
                    return redirect()->back()->withErrors('Please select only image file.');
                }
                $fileName = 'gallery-image-' . time() . '.' . $gallery_image->extension();
                $gallery_image->move(public_path('uploads/gallery/'), $fileName);
                $gallery_image = 'uploads/gallery/' . $fileName;
            } else {
                return redirect('admin/gallery/create')->withErrors('Invalid operation performed!');
            }

            $gallery = new Gallery();
            $gallery->fill([
                'category_id' => $request->post('category_id'),
                'image' => $gallery_image,
            ]);
            $gallery->save();

            return redirect('admin/gallery')->withSuccess('New image added successfully.');
        }
    }

    /**
     * @param Gallery $gallery
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Gallery $gallery, Request $request)
    {
        $validate_value['category_name'] = $request->post('category_id');
        $validate_rule['category_name'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {

            $updateColumns = [
                'category_id' => $request->post('category_id'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $gallery_image = $request->file('gallery_image');

            if ($gallery_image) {
                if (!in_array($gallery_image->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
                    return redirect()->back()->withErrors('Please select only image file.');
                }
                $fileName = 'gallery-image-' . time() . '.' . $gallery_image->extension();
                $gallery_image->move(public_path('uploads/gallery/'), $fileName);
                $gallery_image = 'uploads/gallery/' . $fileName;
                $updateColumns['image'] = $gallery_image;
                if(file_exists(public_path($gallery->image))){
                    unlink(public_path($gallery->image));
                }
            }

            $gallery->fill($updateColumns);
            $gallery->save();

            return redirect('admin/gallery')->withSuccess('Gallery updated successfully.');
        }
    }

    /**
     * @param $id
     * @param Gallery $gallery
     * @return mixed
     */
    public function destroy($id, Gallery $gallery)
    {
        $gallery->destroy($id);

        return redirect()->back()->withSuccess('Gallery deleted successfully!!');
    }
}
