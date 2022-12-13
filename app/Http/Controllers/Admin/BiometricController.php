<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biometric;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class BiometricController extends Controller
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
        $breadcrumb_title = 'Biometric';

        return view('admin.biometric.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function biometric_list_ajax(Request $request)
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
                    $order_column = 'year';
                } elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'month';
                } elseif ($request->order[0]['column'] == 2) {
                    $order_column = 'week1';
                } elseif ($request->order[0]['column'] == 3) {
                    $order_column = 'week2';
                } elseif ($request->order[0]['column'] == 4) {
                    $order_column = 'week3';
                } elseif ($request->order[0]['column'] == 5) {
                    $order_column = 'week4';
                } elseif ($request->order[0]['column'] == 6) {
                    $order_column = 'week5';
                } elseif ($request->order[0]['column'] == 7) {
                    $order_column = 'created_at';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = Biometric::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

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
        $breadcrumb_title = 'Add Biometric';
        $months = [
          '' => 'Select Month',
          'January' => 'January',
          'February' => 'February',
          'March' => 'March',
          'April' => 'April',
          'May' => 'May',
          'June' => 'June',
          'July' => 'July',
          'August' => 'August',
          'September' => 'September',
          'October' => 'October',
          'November' => 'November',
          'December' => 'December',
        ];

        return view('admin.biometric.add', compact('breadcrumb_title', 'months'));
    }

    /**
     * @param $biometric
     * @return Application|Factory|View
     */
    public function edit($biometric)
    {
        $breadcrumb_title = 'Edit Biometric';
        $months = [
            '' => 'Select Month',
            'January' => 'January',
            'February' => 'February',
            'March' => 'March',
            'April' => 'April',
            'May' => 'May',
            'June' => 'June',
            'July' => 'July',
            'August' => 'August',
            'September' => 'September',
            'October' => 'October',
            'November' => 'November',
            'December' => 'December',
        ];

        return view('admin.biometric.edit', compact('breadcrumb_title', 'months', 'biometric'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validate_value['year'] = $request->post('year');
        $validate_rule['year'] = 'required';
        $validate_value['month'] = $request->post('month');
        $validate_rule['month'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect('admin/biometric/create')->withErrors(implode(', ', $validation_errors));
        } else {

            $year = $request->post('year');
            $month = $request->post('month');

            $upload_path = 'uploads/biometric/' . $year . '/' . $month . '/';

            $biometric_file_week1 = $request->file('week1');
            if ($biometric_file_week1) {
                $fileName = 'HCE-BIOMETRIC-WEEK-1' . '.' . $biometric_file_week1->extension();
                $biometric_file_week1->move(public_path($upload_path), $fileName);
                $biometric_file_week1 = $upload_path . $fileName;
            }

            $biometric_file_week2 = $request->file('week2');
            if ($biometric_file_week2) {
                $fileName = 'HCE-BIOMETRIC-WEEK-2' . '.' . $biometric_file_week2->extension();
                $biometric_file_week2->move(public_path($upload_path), $fileName);
                $biometric_file_week2 = $upload_path . $fileName;
            }

            $biometric_file_week3 = $request->file('week3');
            if ($biometric_file_week3) {
                $fileName = 'HCE-BIOMETRIC-WEEK-3' . '.' . $biometric_file_week3->extension();
                $biometric_file_week3->move(public_path($upload_path), $fileName);
                $biometric_file_week3 = $upload_path . $fileName;
            }

            $biometric_file_week4 = $request->file('week4');
            if ($biometric_file_week4) {
                $fileName = 'HCE-BIOMETRIC-WEEK-4' . '.' . $biometric_file_week4->extension();
                $biometric_file_week4->move(public_path($upload_path), $fileName);
                $biometric_file_week4 = $upload_path . $fileName;
            }

            $biometric_file_week5 = $request->file('week5');
            if ($biometric_file_week5) {
                $fileName = 'HCE-BIOMETRIC-WEEK-5' . '.' . $biometric_file_week5->extension();
                $biometric_file_week5->move(public_path($upload_path), $fileName);
                $biometric_file_week5 = $upload_path . $fileName;
            }

            $biometric = new Biometric();
            $biometric->fill([
                'year' => $year,
                'month' => $month,
                'week1' => $biometric_file_week1 ?? null,
                'week2' => $biometric_file_week2 ?? null,
                'week3' => $biometric_file_week3 ?? null,
                'week4' => $biometric_file_week4 ?? null,
                'week5' => $biometric_file_week5 ?? null,
            ]);
            $biometric->save();

            return redirect('admin/biometric')->withSuccess('Biometric data added successfully.');
        }
    }

    /**
     * @param Biometric $biometric
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Biometric $biometric, Request $request)
    {
        $validate_value['year'] = $request->post('year');
        $validate_rule['year'] = 'required';
        $validate_value['month'] = $request->post('month');
        $validate_rule['month'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {

            $updateColumns = [
                'year' => $request->post('year'),
                'month' => $request->post('month'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $upload_path = 'uploads/biometric/' . $updateColumns['year'] . '/' . $updateColumns['month'] . '/';

            $biometric_file_week1 = $request->file('week1');
            if ($biometric_file_week1) {
                if (file_exists(public_path($biometric->week1)) && $biometric->week1 !== null) {
                    unlink(public_path($biometric->week1));
                }
                $fileName = 'HCE-BIOMETRIC-WEEK-1' . '.' . $biometric_file_week1->extension();
                $biometric_file_week1->move(public_path($upload_path), $fileName);
                $updateColumns['week1'] = $upload_path . $fileName;
            }

            $biometric_file_week2 = $request->file('week2');
            if ($biometric_file_week2) {
                if (file_exists(public_path($biometric->week2)) && $biometric->week2 !== null) {
                    unlink(public_path($biometric->week2));
                }
                $fileName = 'HCE-BIOMETRIC-WEEK-2' . '.' . $biometric_file_week2->extension();
                $biometric_file_week2->move(public_path($upload_path), $fileName);
                $updateColumns['week2'] = $upload_path . $fileName;
            }

            $biometric_file_week3 = $request->file('week3');
            if ($biometric_file_week3) {
                if (file_exists(public_path($biometric->week3)) && $biometric->week3 !== null) {
                    unlink(public_path($biometric->week3));
                }
                $fileName = 'HCE-BIOMETRIC-WEEK-3' . '.' . $biometric_file_week3->extension();
                $biometric_file_week3->move(public_path($upload_path), $fileName);
                $updateColumns['week3'] = $upload_path . $fileName;
            }

            $biometric_file_week4 = $request->file('week4');
            if ($biometric_file_week4) {
                if (file_exists(public_path($biometric->week4)) && $biometric->week4 !== null) {
                    unlink(public_path($biometric->week4));
                }
                $fileName = 'HCE-BIOMETRIC-WEEK-4' . '.' . $biometric_file_week4->extension();
                $biometric_file_week4->move(public_path($upload_path), $fileName);
                $updateColumns['week4'] = $upload_path . $fileName;
            }

            $biometric_file_week5 = $request->file('week5');
            if ($biometric_file_week5) {
                if (file_exists(public_path($biometric->week5)) && $biometric->week5 !== null) {
                    unlink(public_path($biometric->week5));
                }
                $fileName = 'HCE-BIOMETRIC-WEEK-5' . '.' . $biometric_file_week5->extension();
                $biometric_file_week5->move(public_path($upload_path), $fileName);
                $updateColumns['week5'] = $upload_path . $fileName;
            }

            $biometric->fill($updateColumns);
            $biometric->save();

            return redirect('admin/biometric')->withSuccess('Biometric data updated successfully.');
        }
    }

    /**
     * @param $id
     * @param Biometric $biometric
     * @return mixed
     */
    public function destroy($id, Biometric $biometric)
    {
        $biometric->destroy($id);

        return redirect()->back()->withSuccess('Biometric data deleted successfully!!');
    }
}
