<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Configuration;

class Configuration extends Model
{
    protected $table = 'parameters';
    protected $fillable = 
    ['organization_id',
    'value', 
    'type', 
    'description'
    ];


    public function getParameter($cad)
    {
    	if($cad=='daystochangepassword')
        $conf = Configuration::find(1);

        return (int)$conf->value; 
    }

}
