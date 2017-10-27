<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client')->withPivot('starts_at', 'finishes_at');
    }
}
