<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteInfoController extends Controller
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
    public function siteInfo()
    {
        $breadcrumb_title = 'Site Information';
        $settingsData = SiteSettings::first();
        return view('admin.site-info.site-information', compact('breadcrumb_title', 'settingsData'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveSiteInfo(Request $request): RedirectResponse
    {
        try {
            $settingsId = $request->post('settings_id');
            $settingsType = $request->post('settings_type');

            $validate_value = $validate_rule = [];

            if ($settingsType === 'header_form') {
                // do nothing
            } else if ($settingsType === 'footer_form') {
                $validate_value['short_information'] = $request->post('short_information');
                $validate_rule['short_information'] = 'required';
            } else if ($settingsType === 'general_form') {
                $validate_value['address'] = $request->post('address');
                $validate_rule['address'] = 'required';
                $validate_value['email_address'] = $request->post('email_address');
                $validate_rule['email_address'] = 'required|email';
                $validate_value['phone_number'] = $request->post('phone_number');
                $validate_rule['phone_number'] = 'required';
            } else {
                return redirect()->back()->withErrors('Invalid operation performed!');
            }

            $validator = Validator::make($validate_value, $validate_rule);

            if ($validator->fails()) {
                $validation_errors = $validator->errors()->all();
                return redirect()->back()->withErrors(implode(', ', $validation_errors));
            } else {
                $updateData = [];

                if ($settingsType === 'header_form') {
                    $header_logo = $request->file('header_logo');
                    if ($header_logo) {
                        $fileName = 'header-logo' . '.' . $header_logo->extension();
                        $header_logo->move(public_path('uploads/'), $fileName);
                        $header_logo = 'uploads/' . $fileName;
                        $updateData['header_logo'] = $header_logo;
                    }
                } else if ($settingsType === 'footer_form') {
                    $footer_logo = $request->file('footer_logo');
                    if ($footer_logo) {
                        $fileName = 'header-logo' . '.' . $footer_logo->extension();
                        $footer_logo->move(public_path('uploads/'), $fileName);
                        $footer_logo = 'uploads/' . $fileName;
                        $updateData['footer_logo'] = $footer_logo;
                    }
                    $updateData['footer_short_info'] = $request->post('short_information');
                } else if ($settingsType === 'general_form') {
                    $updateData = [
                        'address' => $request->post('address'),
                        'email' => $request->post('email_address'),
                        'phone' => $request->post('phone_number'),
                        'facebook_url' => $request->post('facebook_url'),
                        'twitter_url' => $request->post('twitter_url'),
                        'instagram_url' => $request->post('instagram_url')
                    ];
                }

                if (!empty($updateData)) {
                    $updateData['updated_at'] = date('Y-m-d H:i:s');
                    SiteSettings::updateOrCreate(['id' => $settingsId], $updateData);
                    return redirect()->back()->withSuccess('Settings saved successfully.');
                } else {
                    return redirect()->back()->withErrors('Invalid operation performed!');
                }
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
