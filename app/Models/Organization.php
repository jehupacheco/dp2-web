<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'is_parking'];

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }

    public function sensors()
    {
        return $this->belongsToMany('App\Models\Sensor');
    }
}
