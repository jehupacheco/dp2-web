<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Organization;

class Vehicle extends Model
{
    public function organization()
    {
        return $this->belongsTo('App\Models\Organization');
    }

    public function rentings()
    {
        return $this->hasMany('App\Models\Renting');
    }

    public function positions()
    {
        return $this->hasMany('App\Models\Position');
    }

    public function getOrgNameById($org_id)
    {
        $org = Organization::find($org_id);

        return $org->name; 
    }

    public function travels()
    {
        return $this->hasMany('App\Models\Travel');
    }

    public function activeTravels()
    {
        return $this->travels()->where('ended_at', null);
    }
}
