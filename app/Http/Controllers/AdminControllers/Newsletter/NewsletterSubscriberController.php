<?php

namespace App\Http\Controllers\AdminControllers\Newsletter;

use App\Http\Controllers\Controller;
use App\Jobs\SendNewsletterJob;
use App\Mail\SendNewsletter;
use App\Models\NewsletterEmailTemplate;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NewsletterSubscriberController extends Controller
{
    public function index()
    {
        $data = NewsletterSubscriber::latest()
            ->paginate(20);

        return view('admin.newsletter-subscribers.index', compact('data'));
    }
    public function create()
    {
        return view('admin.newsletter-subscribers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|max:255',
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);
        NewsletterSubscriber::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active,
            'subscribed_at' => now(),
        ]);
        return redirect()
            ->route('newsletter.subscribers')
            ->with('success', 'Subscriber added successfully.');
    }

    public function edit($id)
    {
        $data = NewsletterSubscriber::findOrFail($id);
        return view(
            'admin.newsletter-subscribers.edit',
            compact('data')
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|max:255',
            'email' => 'required|email|unique:newsletter_subscribers,email,' . $request->id,
        ]);
        $subscriber = NewsletterSubscriber::findOrFail($request->id);
        $subscriber->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active,
            'unsubscribed_at' => $request->is_active
                ? null
                : now(),
        ]);
        return redirect()
            ->route('newsletter.subscribers')
            ->with('success', 'Subscriber updated successfully.');
    }
    public function delete($id)
    {
        try {

            $subscriber = NewsletterSubscriber::findOrFail($id);

            $subscriber->delete();

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Subscriber deleted successfully.'
                );
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Unable to delete subscriber.'
                );
        }
    }

    public function NewsLetterSubscribers()
    {
        $subscribers = NewsletterSubscriber::latest()->paginate(10);
        $emailtemplates = NewsletterEmailTemplate::all();

        return view('admin.newsletter-subscribers.send-email', compact('subscribers', 'emailtemplates'));
    }


    public function sendNewsletter(Request $request)
    {
        try {
            $request->validate([
                'ids' => 'required|array',
                'news_id' => 'required|exists:newsletter_email_templates,id',
            ]);

            $template = NewsletterEmailTemplate::findOrFail($request->news_id);

            $users = NewsletterSubscriber::whereIn('id', $request->ids)
                ->where('is_active', true)
                ->get();

            foreach ($users as $user) {
                SendNewsletterJob::dispatch($user->id, $template->id);
            }
            return response()->json([
                'success' =>
                'Newsletter queued successfully.'
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'error' =>
                'Unable to send newsletter.'
            ], 500);
        }
    }

    public function unsubscribeNewsletter(int $id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id);

        $subscriber->update([
            'is_active' => false,
            'unsubscribed_at' => now(),
        ]);

        return redirect('/')->with('success', 'Newsletter unsubscribed successfully.');
    }
}
