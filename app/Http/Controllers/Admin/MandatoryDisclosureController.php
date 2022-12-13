<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MandatoryDisclosure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MandatoryDisclosureController extends Controller
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
        $breadcrumb_title = 'Mandatory Disclosure';
        $mandatoryDisclosureData = MandatoryDisclosure::first();

        return view('admin.mandatory-disclosure.index', compact('breadcrumb_title', 'mandatoryDisclosureData'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveMandatoryDisclosureInfo(Request $request): RedirectResponse
    {
        try {
            $disclosure_id = $request->post('disclosure_id');

            $validate_value['description'] = $request->post('description');
            $validate_rule['description'] = 'required';

            $validator = Validator::make($validate_value, $validate_rule);

            if ($validator->fails()) {
                $validation_errors = $validator->errors()->all();
                return redirect()->back()->withErrors(implode(', ', $validation_errors));
            } else {

                $updateData = [
                    'description' => $request->post('description'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                $uploadPath = 'uploads/mandatory-disclosure/';

                $dled_md_format = $request->file('dled_md_format');
                $bed_md_format = $request->file('bed_md_format');
                $balance_sheet = $request->file('balance_sheet');
                $income_and_expenditure = $request->file('income_and_expenditure');
                $receipt_payment = $request->file('receipt_payment');

                if ($dled_md_format) {
                    $fileName = 'dled-md-format' . '.' . $dled_md_format->extension();
                    $dled_md_format->move(public_path($uploadPath), $fileName);
                    $updateData['dled_md_format'] = $uploadPath . $fileName;
                }

                if ($bed_md_format) {
                    $fileName = 'bed-md-format' . '.' . $bed_md_format->extension();
                    $bed_md_format->move(public_path($uploadPath), $fileName);
                    $updateData['bed_md_format'] = $uploadPath . $fileName;
                }

                if ($balance_sheet) {
                    $fileName = 'balance-sheet' . '.' . $balance_sheet->extension();
                    $balance_sheet->move(public_path($uploadPath), $fileName);
                    $updateData['balance_sheet'] = $uploadPath . $fileName;
                }

                if ($income_and_expenditure) {
                    $fileName = 'income_and_expenditure' . '.' . $income_and_expenditure->extension();
                    $income_and_expenditure->move(public_path($uploadPath), $fileName);
                    $updateData['income_and_expenditure'] = $uploadPath . $fileName;
                }

                if ($receipt_payment) {
                    $fileName = 'receipt_payment' . '.' . $receipt_payment->extension();
                    $receipt_payment->move(public_path($uploadPath), $fileName);
                    $updateData['receipt_payment'] = $uploadPath . $fileName;
                }

                if(!empty($updateData)) {
                    MandatoryDisclosure::updateOrCreate(['id' => $disclosure_id], $updateData);
                    return redirect()->back()->withSuccess('Mandatory disclosure details saved successfully.');
                } else {
                    return redirect()->back()->withErrors('Invalid operation performed!');
                }
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
