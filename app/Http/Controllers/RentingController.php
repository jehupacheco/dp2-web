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
        return view('Alquileres.index', compact('rentings'));
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
        DB::beginTransaction();
        try {
            $renting = new Renting();
            $renting->client_id = $input['client_id'];
            $renting->vehicle_id = $input['vehicle_id'];

            $renting->starts_at = $input['start_date'];
            $renting->finishes_at = $input['end_date'];

            $renting->save();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->action('RentingController@index')->with('stored', 'No se registró el Alquiler.'); 
        }
        DB::commit();
        return redirect()->action('ClientController@index')->with('stored', 'Se registró el Alquiler correctamente.'); 
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
