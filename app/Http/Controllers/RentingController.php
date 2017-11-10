<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Vehicle;
use App\Models\Renting;
use DB;

class RentingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentings = Renting::all();
        $clientes= Client::all();
        $vehicles= Vehicle::all();
        return view('Alquileres.index', compact('rentings','clientes','vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Client::all();
        $vehicles = Vehicle::all();
        return view('Alquileres.nuevo_alquiler',compact('clientes','vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $input = $request->all();
        if($input['client_id']!="" && $input['vehicle_id']!=""){
            DB::beginTransaction();
            try {
                $renting = new Renting();
                $renting->client_id = $input['client_id'];
                $renting->vehicle_id = $input['vehicle_id'];

                $renting->starts_at = $input['start_date'];
                $renting->finishes_at = $input['end_date'];

                $renting->save();

                $vehicle = Vehicle::find($input['vehicle_id']);
                $vehicle->mac = strtoupper($input['mac']);
                $vehicle->save();
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->action('RentingController@index')->with('stored', 'No se registró el Alquiler.'); 
            }
            DB::commit();
            return redirect()->action('RentingController@index')->with('stored', 'Se registró el Alquiler correctamente.'); 
        }
        else{
            return redirect()->action('RentingController@create')->with('delete', 'Seleccione el cliente y el vehículo asociado'); 
        }
    }



    public function filtrado_alquileres(Request $request)
    {
        $clientes= Client::all();
        $vehicles= Vehicle::all();

        $input = $request->all();

        if( $input['client_id'] !="" && $input['vehicle_id']!="")
        {
            $rentings = Renting::where('client_id','=', $input['client_id'])->where('vehicle_id','=', $input['vehicle_id'])->get();
        }
        elseif($input['client_id'] !="")
        {
            $rentings = Renting::where('client_id','=', $input['client_id'])->get();
        }
        elseif ($input['vehicle_id']!="") {
            $rentings = Renting::where('vehicle_id','=', $input['vehicle_id'])->get();
        }

        
        return view('Alquileres.index', compact('rentings','clientes','vehicles'));
        
        // return redirect()->action('RentingController@index',['rentings'=>$rentings,'clientes'=>$clientes,'vehicles'=>$vehicles])->with('stored', 'Se ha filtrado los alquileres correctamente');
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
    public function destroy($renting_id)
    {
        try {
            DB::beginTransaction();
            $renting = Renting::find($renting_id);

            $vehicle = Vehicle::find($renting->vehicle_id);
            $vehicle->mac=null;
            $vehicle->save();

            $renting->delete();
            
        } catch (Exception $e) {
            DB::rollback();
                
            return redirect()->action('RentingController@index')->with('stored', 'No se eliminó el Alquiler.');
        }
        DB::commit();
        return redirect()->action('RentingController@index')->with('stored', 'Se ha eliminado el alquiler correctamente.'); 

    }
}
