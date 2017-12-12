<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Datetime;
use DB;
use App\Models\Organization;
use Jenssegers\Date\Date;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tipo_id)
    {
        try {
            $org = Organization::find($tipo_id);
            
            $vehiculos = Vehicle::where('organization_id',$tipo_id)->paginate(9);
            return view('Estacionamiento.index',compact('vehiculos','org'));
        } catch (Exception $e) {
            return view('errors.500');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tipo_id)
    {
        return view('Estacionamiento.nuevo',compact('tipo_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$tipo_id)
    {
        $org = Organization::find($tipo_id);
        $input = $request->all();
        DB::beginTransaction();
        try {
            $vehiculo = new Vehicle();
            $vehiculo->description = $input['description'];
            $vehiculo->plate = '';
            $vehiculo->price = 0.0;
            $vehiculo->mac = $input['mac'];
            $vehiculo->organization_id = $input['org_id'];
            $vehiculo->save();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->action('ParkingController@index',['tipo_id'=>$tipo_id])->with('delete', 'No se registró el estacionamiento correctamente.'); 
        }
        DB::commit();
        return redirect()->action('ParkingController@index',['tipo_id'=>$tipo_id])->with('stored', 'Se registró el estacionamiento correctamente.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.openweathermap.org',
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', '/data/2.5/weather?id=3936456&units=metric&appid=1d984c1d1dea655e8f3a9857e9c8a35a');

        $clima_de_hoy =json_decode($response->getBody()->getContents());

        Date::setLocale('es');
        $today = Date::now()->format('l j F Y H:i:s');

        $angle = DB::table('readings')
            ->where([
                ['travel_id','=','4'],
                ['sensor_id','=','11']
            ])->latest()
            ->first();
        $temperature = DB::table('readings')
            ->where([
                ['travel_id','=','4'],
                ['sensor_id','=','4']
            ])->latest()
            ->first();
        $luminosity = DB::table('readings')
            ->where([
                ['travel_id','=','4'],
                ['sensor_id','=','9']
            ])->latest()
            ->first();
        $uv = DB::table('readings')
            ->where([
                ['travel_id','=','4'],
                ['sensor_id','=','10']
            ])->latest()
            ->first();
        $humidity = DB::table('readings')
            ->where([
                ['travel_id','=','4'],
                ['sensor_id','=','7']
            ])->latest()
            ->first();
        // dd($today);
        $url = DB::table('organizations')
            ->where([
                ['id','=','7']
            ])->latest()
            ->first();
        //$url = Organization::find('7');
        return view('Estacionamiento.ver', compact('clima_de_hoy','today','temperature','luminosity','uv','angle','humidity','url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $tipo_id = $vehicle->organization_id;
        return view('Estacionamiento.editar', compact('vehicle','tipo_id'));
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
        $input = $request->all();
        $vehicle = Vehicle::find($id);
        try {
            $vehicle->plate = '';
            $vehicle->description = $input['description'];
            $vehicle->price = 0.0;
            $vehicle->mac = $input['mac'];

            $vehicle->save();

            $tipo_id = $vehicle->organization_id;
            $org = Organization::find($tipo_id);
            return redirect()->action('ParkingController@index',['tipo_id'=>$tipo_id])->with('stored', 'Se actualizó el estacionamiento de manera correcta.'); 
        } catch (Exception $e) {

            $tipo_id = $vehicle->organization_id;
            $org = Organization::find($tipo_id);
            return redirect()->action('ParkingController@index',['tipo_id'=>$tipo_id])->with('stored', 'No se pudo actualizar el estacionamiento de manera correcta.'); 
        }
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
