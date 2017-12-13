<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Renting;
use App\Models\Client;
use App\Models\Vehicle;
use PDF;

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
        $fecha_inicio="";
        $fecha_fin ="";
        $cliente_id ="";
        return view('Reportes.pantallaDeFiltros', compact('rentings','clientes'),compact('fecha_inicio','fecha_fin','cliente_id'));
    }

    public function filtroReporteClientes(Request $request)
    {
        $input = $request->all();
        $clientes= Client::where('organization_id','!=',7)->get();
        $vehicles= Vehicle::all();
        //dd($input);
 

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
        
        $fecha_inicio=$input['fechaInicial'];
        $fecha_fin = $input['fechaFin'];
        $cliente_id = $input['client_id'];
        return view('Reportes.pantallaDeFiltros', compact('rentings','clientes','vehicles'),compact('fecha_inicio','fecha_fin','cliente_id'));
    }


    public function GenerarReporteClientes(Request $request,$client_id)
    {
        $input = $request->all();
        $client= Client::find($client_id);
        $vehicles= Vehicle::all();
        //dd($input);
 

        if($input['cliente_id'] !="" && $input['fecha_inicio'] =="" && $input['fecha_fin'] ==""){
            $rentings = Renting::where('client_id','=',$input['cliente_id'])->get();
        }
        elseif ($input['fecha_inicio'] !="" && $input['cliente_id'] =="" && $input['fecha_fin'] =="") {
            $rentings = Renting::where('starts_at','>',$input['fecha_inicio'])->get();
        }
        elseif ($input['fecha_fin'] !="" && $input['fecha_inicio'] =="" && $input['cliente_id'] =="") {
            $rentings = Renting::where('finishes_at','<',$input['fecha_fin'])->get();
        }
        elseif ($input['cliente_id'] !="" && $input['fecha_inicio'] !="" && $input['fecha_fin'] =="") {
            $rentings = Renting::where('client_id','=',$input['cliente_id'])->where('starts_at','>',$input['fecha_inicio'])->get();
        }
        elseif ($input['cliente_id'] !="" && $input['fecha_fin'] !="" && $input['fecha_inicio'] =="") {
            $rentings = Renting::where('client_id','=',$input['cliente_id'])->where('finishes_at','<',$input['fecha_fin'])->get();
        }
        elseif ($input['fecha_inicio'] !="" && $input['fecha_fin'] !="" && $input['cliente_id'] =="") {
            $rentings = Renting::where('starts_at','>',$input['fecha_inicio'])->where('finishes_at','<',$input['fecha_fin'])->get();
        }
        elseif ($input['cliente_id'] !="" && $input['fecha_inicio'] !="" && $input['fecha_fin'] !=""){
            $rentings = Renting::where('client_id','=',$input['cliente_id'])->where('starts_at','>',$input['fecha_inicio'])->where('finishes_at','<',$input['fecha_fin'])->get();
        }
        else{
            $rentings = Renting::all();
        }
        $rentings = $rentings->filter(function($renting)
        {
            return $renting->getOrgId()!=7;
        });
        
        // $view =  \View::make('Reportes.client_invoice', compact('rentings','client'))->render();
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf = PDF::loadHTML($view);
        // return $pdf->stream();
        // // $view = \View::make('Reportes.client_invoice',compact('rentings','client'))
        // $pdf = PDF::loadView('Reportes.client_invoice', compact('rentings','client'));
        // return $pdf->download('invoice.pdf');

        // $view =  \View::make('Reportes.client_invoice', compact('rentings','client'))->render();
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML($view);
        // return $pdf->download('invoice.pdf');

        return view('Reportes.client_invoice', compact('rentings','client'));
    }
}
