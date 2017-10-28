<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renting extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }
}
