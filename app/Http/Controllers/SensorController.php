<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Reading;
use App\Models\Travel;
use DB;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $vehiculo = Vehicle::find($id);
        dd($vehiculo);
        $travel = Travel::where('vehicle_id','=',$vehiculo->id)->first();
        $sensorPeso = Reading::where('travel_id','=',$travel->id)->where('code','=','F01')->first();
        $sensoRitmoCardio = Reading::where('travel_id','=',$travel->id)->where('code','=','F02')->first();
        $sensorProximidad = Reading::where('travel_id','=',$travel->id)->where('code','=','F03')->first();
        $sensorTemperatura = Reading::where('travel_id','=',$travel->id)->where('code','=','F04')->first();
        $sensorVelocidad = Reading::where('travel_id','=',$travel->id)->where('code','=','F05')->first();
        $sensorBateria = Reading::where('travel_id','=',$travel->id)->where('code','=','F06')->first();
        $sensorHumedad = Reading::where('travel_id','=',$travel->id)->where('code','=','F07')->first();
        //return view('Sensores.index',compact('vehiculo'));
        return view('Sensores.index',compact('vehiculo','sensorPeso','sensoRitmoCardio','sensorProximidad','sensorTemperatura',          'sensorVelocidad','sensorBateria','sensorHumedad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
