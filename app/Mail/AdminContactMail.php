<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.admin-contactmail')
            ->with([
                'country'  => $this->data['country'],
                'mail'     => $this->data['email'],
                'name'     => $this->data['full_name'],
                'contact'  => $this->data['number'],
                'messages' => $this->data['message'],
            ])
            ->subject('Contact Inquiry');
    }
}
