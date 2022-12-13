<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infrastructure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfrastructureController extends Controller
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
        $breadcrumb_title = 'Infrastructure';
        $infrastructureData = Infrastructure::first();

        return view('admin.infrastructure.index', compact('breadcrumb_title', 'infrastructureData'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveInfrastructureInfo(Request $request): RedirectResponse
    {
        try {
            $infrastructure_type = $request->post('infrastructure_type');
            $infrastructure_id = $request->post('infrastructure_id');

            if(!in_array($infrastructure_type, ['building', 'campus', 'class_rooms', 'smart_class', 'laboratories', 'music', 'library', 'canteen'])) {
                return redirect()->back()->withErrors('Invalid operation performed!');
            }

            $filteredValidationRules = $this->filterFormData($request, true);

            $validator = Validator::make($filteredValidationRules['values'], $filteredValidationRules['rules']);

            if ($validator->fails()) {
                $validation_errors = $validator->errors()->all();
                return redirect()->back()->withErrors(implode(', ', $validation_errors));
            } else {

                $filteredData = $this->filterFormData($request);

                if (!empty($filteredData)) {
                    $filteredData['updated_at'] = date('Y-m-d H:i:s');
                    Infrastructure::updateOrCreate(['id' => $infrastructure_id], $filteredData);
                    return redirect()->back()->withSuccess('Infrastructure details saved successfully.');
                } else {
                    return redirect()->back()->withErrors('Invalid operation performed!');
                }
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @param $request
     * @param bool $returnValidationRules
     * @return array|array[]
     */
    private function filterFormData($request, bool $returnValidationRules = false): array
    {
        $infrastructure_type = $request->post('infrastructure_type');

        if ($infrastructure_type === 'building') {
            $validate_value['building'] = $request->post('building');
            $validate_rule['building'] = 'required';
        } else if ($infrastructure_type === 'campus') {
            $validate_value['campus'] = $request->post('campus');
            $validate_rule['campus'] = 'required';
        } else if ($infrastructure_type === 'class_rooms') {
            $validate_value['class_rooms'] = $request->post('class_rooms');
            $validate_rule['class_rooms'] = 'required';
        } else if ($infrastructure_type === 'smart_class') {
            $validate_value['smart_class'] = $request->post('smart_class');
            $validate_rule['smart_class'] = 'required';
        } else if ($infrastructure_type === 'laboratories') {
            $validate_value['laboratories'] = $request->post('laboratories');
            $validate_rule['laboratories'] = 'required';
        } else if ($infrastructure_type === 'music') {
            $validate_value['music'] = $request->post('music');
            $validate_rule['music'] = 'required';
        } else if ($infrastructure_type === 'library') {
            $validate_value['library'] = $request->post('library');
            $validate_rule['library'] = 'required';
        } else if ($infrastructure_type === 'canteen') {
            $validate_value['canteen'] = $request->post('canteen');
            $validate_rule['canteen'] = 'required';
        } else {
            $validate_value['infrastructure_type'] = $request->post('infrastructure_type');
            $validate_rule['infrastructure_type'] = 'required';
        }

        return ($returnValidationRules === true) ? ['values' => $validate_value, 'rules' => $validate_rule] : $validate_value;
    }
}
