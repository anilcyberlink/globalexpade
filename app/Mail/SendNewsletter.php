<?php

namespace App\Mail;

use App\Models\NewsletterEmailTemplate;
use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    public $subscriber;

    /**
     * Create a new message instance.
     */
    public function __construct($templateId, $subscriberId)
    {
        $this->template = NewsletterEmailTemplate::findOrFail($templateId);

        $this->subscriber = NewsletterSubscriber::findOrFail($subscriberId);
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->template->title)
            ->view('emails.newsletter-template')
            ->with([
                'title' => $this->template->title,
                'content' => $this->template->content,
                'subscriber' => $this->subscriber,

            ]);
    }
}
