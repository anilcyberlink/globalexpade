<?php

namespace App\Http\Controllers\AdminControllers\Newsletter;

use App\Http\Controllers\Controller;
use App\Models\NewsletterEmailTemplate;
use Illuminate\Http\Request;

class NewsletterEmailTemplateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = NewsletterEmailTemplate::latest()
            ->paginate(20);

        return view(
            'admin.newsletter-email-template.index',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view(
            'admin.newsletter-email-template.create'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|max:255',

            'content' => 'required',

            'publish_date' => 'nullable|date',
        ]);

        NewsletterEmailTemplate::create([

            'title' => $request->title,

            'content' => $request->content,

            'publish_date' => $request->publish_date,

            'is_active' => true,
        ]);

        return redirect()
            ->route('newsletter.email.template')
            ->with(
                'success',
                'Email template created successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $newsletter = NewsletterEmailTemplate::findOrFail($id);

        return view(
            'admin.newsletter-email-template.edit',
            compact('newsletter')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'publish_date' => 'nullable|date',
        ]);

        $template = NewsletterEmailTemplate::findOrFail($id);

        $template->update([
            'title' => $request->title,
            'content' => $request->content,
            'publish_date' => $request->publish_date,
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Email template updated successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        $template = NewsletterEmailTemplate::findOrFail($id);

        $template->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Email template deleted successfully.'
            );
    }
}