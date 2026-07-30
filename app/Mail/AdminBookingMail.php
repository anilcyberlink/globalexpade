<?php

namespace App\Mail;

use App\Models\Inquiry\BookingModel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public BookingModel $booking;

    public function __construct(BookingModel $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->subject('New Trip Booking')
            ->view('emails.admin-bookingmail')
            ->with([
                'trip_title'     => $this->booking->title,
                'name'           => $this->booking->full_name,
                'email'          => $this->booking->email,
                'contact'        => $this->booking->phone,
                'country'        => $this->booking->country,
                'arrival_date'   => $this->booking->arrival_date,
                'departure_date' => $this->booking->departure_date,
                'user_message'        => $this->booking->comments,
            ]);
    }
}
