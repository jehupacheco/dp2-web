<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Organization;
use App\Models\Renting;

class Vehicle extends Model
{

    protected $fillable = ['price'];

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

    public function readings()
    {
        return $this->hasManyThrough('App\Models\Reading', 'App\Models\Travel');
    }

    public function travels()
    {
        return $this->hasMany('App\Models\Travel');
    }

    public function activeTravels()
    {
        return $this->travels()->where('ended_at', null);
    }

    public function is_rented()
    {
        $cantidad = Renting::where('vehicle_id','=', $this->id)->where('returned_at','=',null)->count();
        
        if($cantidad>0)
            return true;
        else
            return false;


    }
}
