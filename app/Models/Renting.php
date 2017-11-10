<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Vehicle;
use App\Models\Organization;

class Renting extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function getOrgNameById($vehicle_id)
    {
    	$vehicle = Vehicle::find($vehicle_id);
        $org = Organization::find($vehicle->organization_id);

        return $org->name; 
    }


    public function getPlateById($vehicle_id)
    {
    	$vehicle = Vehicle::find($vehicle_id);
    	return $vehicle->plate;
    }

    public function getClientNameById($client_id)
    {
    	$client = CLient::find($client_id);
    	return $client->name.' '.$client->lastname;
    }

    public function getCostUnitById($vehicle_id)
    {
        
    }
}
