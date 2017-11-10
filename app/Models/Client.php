<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Organization;

class Client extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['email', 'name', 'lastname', 'phone'];

    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function rentings()
    {
        return $this->hasMany('App\Models\Renting');
    }

    public function travels()
    {
        return $this->hasMany('App\Models\Travel');
    }

    public function activeTravels()
    {
        return $this->travels()->where('ended_at', null);
    }

    public function readings()
    {
        return $this->hasManyThrough('App\Models\Reading', 'App\Models\Travel');
    }

    public function getOrgNameById($org_id)
    {
        $org = Organization::find($org_id);

        return $org->name; 
    }
}
