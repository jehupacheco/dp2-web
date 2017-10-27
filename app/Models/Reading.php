<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    public function travel()
    {
        return $this->belongsTo('App\Models\Travel');
    }

    public function sensor()
    {
        return $this->belongsTo('App\Models\Sensor');
    }
}
