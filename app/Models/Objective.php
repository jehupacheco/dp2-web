<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $fillable = ['goal', 'sensor_id', 'ends_at'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function sensor()
    {
        return $this->belongsTo('App\Models\Sensor');
    }
}
