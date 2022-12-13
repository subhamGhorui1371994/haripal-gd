<?php

namespace App\Http\Controllers;


use App\Mail\NotifyMail;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('pages.contact');
    }

    public function sendContactMail(Request $request)
    {
        try {
            $name = $request->post('name');
            $email = $request->post('email');
            $mobile = $request->post('mobile');
            $message = $request->post('message');

            $siteSettings = SiteSettings::first();
            if (!empty($siteSettings->email)) {
                Mail::to($siteSettings->email)->send(new NotifyMail(date('Y'), $name, $email, $mobile, $message));
                if (Mail::failures()) {
                    return json_encode(['status' => false, 'msg' => 'Sorry! Now your message is not being sent due to some issue. Please try again later. Otherwise, mail to the email given in the contact section or call the phone number.', 'data' => '']);
                } else {
                    return json_encode(['status' => true, 'msg' => 'We have received your message. We will contact you in a few days.', 'data' => '']);
                }
            } else {
                return json_encode(['status' => false, 'msg' => 'Sorry! Now your message is not being sent due to some issue. Please try again later. Otherwise, mail to the email given in the contact section or call the phone number.', 'data' => '']);
            }
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'msg' => 'Sorry! Now your message is not being sent due to some issue. Please try again later. Otherwise, mail to the email given in the contact section or call the phone number.', 'data' => $exception->getMessage()]);
        }
    }

}
