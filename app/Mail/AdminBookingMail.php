<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->view('emails.admin-bookingmail')
            ->with([
                'start_date' => $this->booking->departure_date,
                'num_ppl'    => $this->booking->num_people,
                'email'      => $this->booking->email,
                'name'       => $this->booking->full_name,
                'country'    => $this->booking->country,
                'contact'    => $this->booking->phone,
                'messages'   => $this->booking->comments,
                'trip_title' => $this->booking->title,
            ])
            ->subject('New Trip Booking Inquiry');
    }
}
