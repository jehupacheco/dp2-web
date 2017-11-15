<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }
}
