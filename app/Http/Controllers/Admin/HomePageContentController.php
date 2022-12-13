<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomePageContentController extends Controller
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
        $breadcrumb_title = 'Home Page';
        $settingsData = HomePage::first();
        return view('admin.pages.home-page', compact('breadcrumb_title', 'settingsData'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function savePageContent(Request $request): RedirectResponse
    {
        try {
            $settingsId = $request->post('home_content_id');

            $validate_value['welcome_title'] = $request->post('welcome_title');
            $validate_rule['welcome_title'] = 'required';
            $validate_value['welcome_content'] = $request->post('welcome_content');
            $validate_rule['welcome_content'] = 'required';
            $validate_value['about_us_title'] = $request->post('about_us_title');
            $validate_rule['about_us_title'] = 'required';
            $validate_value['about_us_content'] = $request->post('about_us_content');
            $validate_rule['about_us_content'] = 'required';
            $validate_value['about_trust_title'] = $request->post('about_trust_title');
            $validate_rule['about_trust_title'] = 'required';
            $validate_value['about_trust_content'] = $request->post('about_trust_content');
            $validate_rule['about_trust_content'] = 'required';
            $validate_value['president_desk_title'] = $request->post('president_desk_title');
            $validate_rule['president_desk_title'] = 'required';
            $validate_value['president_desk_content'] = $request->post('president_desk_content');
            $validate_rule['president_desk_content'] = 'required';
            $validate_value['secretary_desk_title'] = $request->post('secretary_desk_title');
            $validate_rule['secretary_desk_title'] = 'required';
            $validate_value['secretary_desk_content'] = $request->post('secretary_desk_content');
            $validate_rule['secretary_desk_content'] = 'required';

            $validator = Validator::make($validate_value, $validate_rule);

            if ($validator->fails()) {
                $validation_errors = $validator->errors()->all();
                return redirect()->back()->withErrors(implode(', ', $validation_errors));
            } else {

                $updateData = [
                    'welcome_title' => $request->post('welcome_title'),
                    'welcome_content' => $request->post('welcome_content'),
                    'about_us_title' => $request->post('about_us_title'),
                    'about_us_content' => $request->post('about_us_content'),
                    'about_trust_title' => $request->post('about_trust_title'),
                    'about_trust_content' => $request->post('about_trust_content'),
                    'president_desk_title' => $request->post('president_desk_title'),
                    'president_desk_content' => $request->post('president_desk_content'),
                    'secretary_desk_title' => $request->post('secretary_desk_title'),
                    'secretary_desk_content' => $request->post('secretary_desk_content'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                if (!empty($updateData)) {
                    HomePage::updateOrCreate(['id' => $settingsId], $updateData);
                    return redirect()->back()->withSuccess('Home page content saved successfully.');
                } else {
                    return redirect()->back()->withErrors('Invalid operation performed!');
                }
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
