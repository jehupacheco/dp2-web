<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Renting;
use App\Models\Client;
use App\Models\Vehicle;

class ReportController extends Controller
{

    public function filtroReporte()
    {

        $clientes= Client::where('organization_id','!=',7)->get();
        $rentings = Renting::all();
        $rentings = $rentings->filter(function($renting)
        {
            return $renting->getOrgId()!=7;
        });
        return view('Reportes.pantallaDeFiltros', compact('rentings','clientes'));
    }

    public function filtroReporteClientes(Request $request)
    {
        $input = $request->all();
        $clientes= Client::where('organization_id','!=',7)->get();
        $vehicles= Vehicle::all();
        if($input['client_id'] !=""){
            $rentings = Renting::where('client_id','=',$input['client_id'])->get();
        }
        else{
            $rentings = Renting::all();
        }
        $rentings = $rentings->filter(function($renting)
        {
            return $renting->getOrgId()!=7;
        });
        
        return view('Reportes.pantallaDeFiltros', compact('rentings','clientes','vehicles'));
    }
}
