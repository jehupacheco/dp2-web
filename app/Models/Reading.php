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
    public function getVehiclePlacaById2($id_travel)
    {
        $vehicle = Travel::find($id_travel);
        return $vehicle->vehicle_id;
    }
    public function getOrganization($id_travel)
    {
    	$travel = Travel::find($id_travel);
    	$id_vehicle=$travel->vehicle_id;
        $vehicle = vehicle::find($id_vehicle);
        $organization = organization::find($vehicle->organization_id);
        return $organization->name;
    }
}
