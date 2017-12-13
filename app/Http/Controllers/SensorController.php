<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Reading;
use App\Models\Organization;
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
        $org = Organization::find($vehiculo->organization_id);
        $sensors = DB::table('organization_sensor')
            ->select(DB::raw('sensor_id as sensor_id'))
            ->where([
                    ['organization_id','=', $org->id]
                ])
            ->get();
        $travel = Travel::where('vehicle_id','=',$vehiculo->id)->orderBy('created_at','desc')->first();
        $sensorPeso = null;
        $sensoRitmoCardio = null;
        $sensorProximidad = null;
        $sensorTemperatura = null;
        $sensorVelocidad = null;
        $sensorBateria = null;
        $sensorHumedad = null;
        
        if ($travel != null) {

            $sensorPeso = Reading::where('travel_id','=',$travel->id)->where('sensor_id','=','1')->orderBy('created_at','desc')->first();
            $sensoRitmoCardio = Reading::where('travel_id','=',$travel->id)->where('sensor_id','=','2')->orderBy('created_at','desc')->first();
            $sensorProximidad = Reading::where('travel_id','=',$travel->id)->where('sensor_id','=','3')->orderBy('created_at','desc')->first();
            $sensorTemperatura = Reading::where('travel_id','=',$travel->id)->where('sensor_id','=','4')->orderBy('created_at','desc')->first();
            $sensorVelocidad = Reading::where('travel_id','=',$travel->id)->where('sensor_id','=','5')->orderBy('created_at','desc')->first();
            $sensorBateria = Reading::where('travel_id','=',$travel->id)->where('sensor_id','=','6')->orderBy('created_at','desc')->first();
            $sensorHumedad = Reading::where('travel_id','=',$travel->id)->where('sensor_id','=','7')->orderBy('created_at','desc')->first();
        }
        //return view('Sensores.index',compact('vehiculo'));
        return view('Sensores.index',compact('vehiculo','sensorPeso','sensoRitmoCardio','sensorProximidad','sensorTemperatura',          'sensorVelocidad','sensorBateria','sensorHumedad','sensors'));
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
