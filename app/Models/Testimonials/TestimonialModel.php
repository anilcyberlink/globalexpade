<?php

namespace App\Models\Testimonials;

use Illuminate\Database\Eloquent\Model;

class TestimonialModel extends Model
{
    protected $table = 'testimonials';

    protected $fillable = [

        'name',
        'country',
        'title',
        'trip_name',
        'trip_type',
        'testimonial',
        'picture',
        'rating',
        'featured',
        'status',
        'sort_order'

    ];
}
