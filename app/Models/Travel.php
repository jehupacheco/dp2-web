<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = [
        'started_at'
    ];

    public function readings()
    {
        return $this->hasMany('App\Models\Reading');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function getClientNameById($client_id)
    {
        $client = CLient::find($client_id);
        return $client->name.' '.$client->lastname;
    }

    public function getVehiclePlacaById($vehicle_id)
    {
        $vehicle = Vehicle::find($vehicle_id);
        return $vehicle->mac;
    }
}
