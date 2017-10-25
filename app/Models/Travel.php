<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    public function readings()
    {
        return $this->hasMany('App\Models\Reading');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }
}
