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


    public function getParameter($cad,$org_id)
    {
    	if($cad=='daystochangepassword')
        $conf = Configuration::where('organization_id','=',$org_id)->where('type','=',1)->first();

        return (int)$conf->value; 
    }

    public function getParameterByOrgIdAndType($org_id,$type){
        $conf = Configuration::where('organization_id','=',$org_id)->where('type','=',$type)->value('value');
        return $conf;
    }

}
