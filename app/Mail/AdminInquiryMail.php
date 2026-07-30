<?php

namespace App\Mail;

use App\Models\Inquiry\TripInquiryModel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public TripInquiryModel $inquiry;

    public function __construct(TripInquiryModel $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function build()
    {
        return $this->subject('New Trip Inquiry')
            ->view('emails.admin-inquiry')
            ->with([
                'trip_title'   => $this->inquiry->title,
                'name'         => $this->inquiry->name,
                'email'        => $this->inquiry->email,
                'subject'      => $this->inquiry->review,
                'user_message' => $this->inquiry->comments,
            ]);
    }
}
