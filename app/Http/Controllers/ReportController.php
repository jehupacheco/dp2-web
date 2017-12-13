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
        $status = false;
        //dd($input);
        if($input['client_id'] !="") $status = true;

        if($input['client_id'] !="" && $input['fechaInicial'] =="" && $input['fechaFin'] ==""){
            $rentings = Renting::where('client_id','=',$input['client_id'])->get();
        }
        elseif ($input['fechaInicial'] !="" && $input['client_id'] =="" && $input['fechaFin'] =="") {
            $rentings = Renting::where('starts_at','>',$input['fechaInicial'])->get();
        }
        elseif ($input['fechaFin'] !="" && $input['fechaInicial'] =="" && $input['client_id'] =="") {
            $rentings = Renting::where('finishes_at','<',$input['fechaFin'])->get();
        }
        elseif ($input['client_id'] !="" && $input['fechaInicial'] !="" && $input['fechaFin'] =="") {
            $rentings = Renting::where('client_id','=',$input['client_id'])->where('starts_at','>',$input['fechaInicial'])->get();
        }
        elseif ($input['client_id'] !="" && $input['fechaFin'] !="" && $input['fechaInicial'] =="") {
            $rentings = Renting::where('client_id','=',$input['client_id'])->where('finishes_at','<',$input['fechaFin'])->get();
        }
        elseif ($input['fechaInicial'] !="" && $input['fechaFin'] !="" && $input['client_id'] =="") {
            $rentings = Renting::where('starts_at','>',$input['fechaInicial'])->where('finishes_at','<',$input['fechaFin'])->get();
        }
        elseif ($input['client_id'] !="" && $input['fechaInicial'] !="" && $input['fechaFin'] !=""){
            $rentings = Renting::where('client_id','=',$input['client_id'])->where('starts_at','>',$input['fechaInicial'])->where('finishes_at','<',$input['fechaFin'])->get();
        }
        else{
            $rentings = Renting::all();
        }
        $rentings = $rentings->filter(function($renting)
        {
            return $renting->getOrgId()!=7;
        });
        
        return view('Reportes.pantallaDeFiltros', compact('rentings','clientes','vehicles'),compact('status'));
    }
}
