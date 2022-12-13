<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $currentYear;
    public $name;
    public $email;
    public $mobile;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($currentYear, $name, $email, $mobile, $message)
    {
        $this->currentYear = $currentYear;
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'date' => $this->currentYear,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'messageBody' => $this->message,
        ];

        return $this->subject('Contact Us')
            ->view('emails.index', $data);
    }
}
