<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class NewsletterEmailTemplate extends Model
{
    protected $table = 'newsletter_email_templates';
    protected $fillable = [
        'title',
        'content',
        'publish_date',
        'is_active',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'is_active' => 'boolean',
    ];
}