<?php

namespace App\Jobs;

use App\Mail\SendNewsletter;
use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userId;
    public $templateId;

    /**
     * Create a new job instance.
     */
    public function __construct($userId, $templateId)
    {
        $this->userId = $userId;
        $this->templateId = $templateId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $user = NewsletterSubscriber::find($this->userId);

        if (!$user || !$user->is_active) {
            return;
        }

        Mail::to($user->email)
            ->send(new SendNewsletter($this->templateId, $user->id));
    }
}