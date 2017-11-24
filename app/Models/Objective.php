<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Objective extends Model
{
    use SoftDeletes;

    protected $fillable = ['goal', 'sensor_id', 'ends_at', 'description'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function sensor()
    {
        return $this->belongsTo('App\Models\Sensor');
    }

    public function readings()
    {
        return $this->belongsToMany('App\Models\Reading');
    }
}
