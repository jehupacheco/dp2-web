<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function vehicles()
    {
        return $this->belongsToMany('App\Models\Vehicle')->withPivot('starts_at', 'finishes_at');
    }
}
