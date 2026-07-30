<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Model\Contact;

class AdminContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public Contact $data;

    public function __construct(Contact $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Contact Inquiry')
            ->view('emails.admin-contactmail')
            ->with([
                'name'     => $this->data->full_name,
                'mail'     => $this->data->email,
                'contact'  => $this->data->number,
                'subject'  => $this->data->subject,
                'user_message'  => $this->data->message,
            ]);
    }
}
