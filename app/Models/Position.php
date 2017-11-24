<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    static protected $radius = 6371e3;

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function getDistance(Position $position2)
    {
        $phi1 = deg2rad($this->latitude);
        $phi2 = deg2rad($position2->latitude);

        $deltaPhi = deg2rad($position2->latitude - $this->latitude);
        $deltaLambda = deg2rad($position2->longitude - $this->longitude);
        
        $a = sin($deltaPhi/2) * sin($deltaPhi/2) + cos($phi1) * cos($phi2) * sin($deltaLambda/2) * sin($deltaLambda/2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = Position::$radius * $c;

        return $d;
    }
}
