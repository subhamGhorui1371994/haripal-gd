<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageBanners;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class HomePageBannerController extends Controller
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
        $breadcrumb_title = 'Banners';

        return view('admin.pages.banners.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function banner_list_ajax(Request $request)
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
                    $order_column = 'image';
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

        $details = HomePageBanners::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

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
        $breadcrumb_title = 'Add Banner';

        return view('admin.pages.banners.add', compact('breadcrumb_title'));
    }

    /**
     * @param $homePageBanners
     * @return Application|Factory|View
     */
    public function edit($homePageBanners)
    {
        $breadcrumb_title = 'Edit Banner';

        $homePageBanners = HomePageBanners::find($homePageBanners);

        return view('admin.pages.banners.edit', compact('breadcrumb_title', 'homePageBanners'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validate_value['title'] = $request->post('title');
        $validate_rule['title'] = 'required';
        $validate_value['image_link'] = $request->file('image_link');
        $validate_rule['image_link'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect('admin/home-page-banners/create')->withErrors(implode(', ', $validation_errors));
        } else {

            $banner_file = $request->file('image_link');

            if ($banner_file) {
                if (!in_array($banner_file->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
                    return redirect()->back()->withErrors('Please select only image file.');
                }
                $fileName = 'HCE-BANNER-' . time() . '.' . $banner_file->extension();
                $banner_file->move(public_path('uploads/banners/'), $fileName);
                $banner_file = 'uploads/banners/' . $fileName;
            }

            $homePageBanners = new HomePageBanners();
            $homePageBanners->fill([
                'title' => $request->post('title'),
                'image_link' => $banner_file ?? null,
            ]);
            $homePageBanners->save();

            return redirect('admin/home-page-banners')->withSuccess('Banner added successfully.');
        }
    }

    /**
     * @param $homePageBanners
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update($homePageBanners, Request $request)
    {
        $validate_value['title'] = $request->post('title');
        $validate_rule['title'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {

            $homePageBanners = HomePageBanners::find($homePageBanners);

            $updateColumns = [
                'title' => $request->post('title'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $banner_file = $request->file('image_link');

            if ($banner_file) {
                if (!in_array($banner_file->extension(), ['jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP"])) {
                    return redirect()->back()->withErrors('Please select only image file.');
                }
                $fileName = 'HCE-BANNER-' . time() . '.' . $banner_file->extension();
                $banner_file->move(public_path('uploads/banners/'), $fileName);
                $updateColumns['image_link'] = 'uploads/banners/' . $fileName;
                if (file_exists(public_path($homePageBanners->image_link))) {
                    unlink(public_path($homePageBanners->image_link));
                }
            }

            $homePageBanners->fill($updateColumns);
            $homePageBanners->save();

            return redirect('admin/home-page-banners')->withSuccess('Banner updated successfully.');
        }
    }

    /**
     * @param $id
     * @param HomePageBanners $homePageBanners
     * @return mixed
     */
    public function destroy($id, HomePageBanners $homePageBanners)
    {
        $homePageBanners->destroy($id);

        return redirect()->back()->withSuccess('Banner deleted successfully!!');
    }
}
