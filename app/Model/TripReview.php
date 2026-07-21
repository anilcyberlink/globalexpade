<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Models\Travels\TripModel;

class TripReview extends Model
{
    protected $fillable=['trip_id','name','sub_title','image','brief','content','status'];

    public function trips()
    {
        return $this->belongsTo('App\Models\Travels\TripModel','trip_id');
    }
}
