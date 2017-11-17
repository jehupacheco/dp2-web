<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle_available extends Model
{
    //
    protected $table = 'vehicle_available';
    protected $fillable = ['id_vehicle', 'starts_at', 'finishes_at', 'state'];
}
