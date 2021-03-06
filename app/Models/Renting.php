<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Vehicle;
use App\Models\Organization;
use Carbon\Carbon;

class Renting extends Model
{
    protected $appends = ['totalCost'];

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

    public function getOrgId()
    {
        $vehicle_id = $this->vehicle_id;
        $vehicle = Vehicle::find($vehicle_id);

        return $vehicle->organization_id;

    }

    public function getPlateById($vehicle_id)
    {
    	$vehicle = Vehicle::find($vehicle_id);
    	return $vehicle->plate;
    }

    public function getClient()
    {
        $client = CLient::find($this->client_id);
        return $client;
    }

    public function getClientNameById($client_id)
    {
    	$client = CLient::find($client_id);
    	return $client->name.' '.$client->lastname;
    }

    public function getCostUnitById($vehicle_id)
    {
        $vehicle = Vehicle::find($vehicle_id);
        return $vehicle->price;
    }

    public function getTotalCost()
    {
        $vehicle_id = $this->vehicle_id;
        $vehicle = Vehicle::find($vehicle_id);

        // $now = Carbon::now();
        $start_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->starts_at);
        if($this->returned_at !=null){//Aún no se ha devuelto el vehículo
            if($this->returned_at>$this->finishes_at)
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->returned_at);
            else
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->finishes_at);
        }
        else{
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->finishes_at);
        }
        // dd($start_date);
        // dd($end_date->diffInHours($start_date));
        return $end_date->diffInHours($start_date)*$vehicle->price;
    }

    public function getNHours(){
        $vehicle_id = $this->vehicle_id;
        $vehicle = Vehicle::find($vehicle_id);

        // $now = Carbon::now();
        $start_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->starts_at);
        if($this->returned_at !=null){//Aún no se ha devuelto el vehículo
            if($this->returned_at>$this->finishes_at)
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->returned_at);
            else
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->finishes_at);
        }
        else{
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->finishes_at);
        }
        // dd($start_date);
        // dd($end_date->diffInHours($start_date));
        return $end_date->diffInHours($start_date);
    }

    public function getTotalCostAttribute()
    {
        $vehicle_id = $this->vehicle_id;
        $vehicle = Vehicle::find($vehicle_id);

        // $now = Carbon::now();
        $start_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->starts_at);
        if($this->returned_at !=null){//Aún no se ha devuelto el vehículo
            if($this->returned_at>$this->finishes_at)
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->returned_at);
            else
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->finishes_at);
        }
        else{
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s',$this->finishes_at);
        }
        // dd($start_date);
        // dd($end_date->diffInHours($start_date));
        return $end_date->diffInHours($start_date)*$vehicle->price;
    }    
}
