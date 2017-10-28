<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }
}
