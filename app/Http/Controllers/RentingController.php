<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Vehicle;
use App\Models\Renting;
use DB;
use Auth;
use Carbon\Carbon;

class RentingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        $rentings = Renting::all();
        if(!$user->hasRole('Administrador General')){
              $rentings = $rentings->filter(function($renting) use ($user)
              {
                 return $renting->getOrgId() == $user->organization_id;
               });
        }

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
        $user = Auth::user();
        // $this->update_list_of_vehicles($user); //Actualizamos la lista de los vehículos, para saber si ya estan disponibles
        if($user->hasRole('Administrador General')){
            $clientes = Client::all();
            $vehicles = Vehicle::all();
        }
        else{
            $clientes = Client::where('organization_id','=', $user->organization_id)->get();
            $vehicles = Vehicle::where('organization_id',$user->organization_id)->get();
        }

        $vehicles = $vehicles->filter(function($vehicle)
          {
             return !$vehicle->is_rented();
           });
        
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

                // $vehicle = Vehicle::find($input['vehicle_id']);
                // $vehicle->mac = strtoupper($input['mac']);
                // $vehicle->save();
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



    public function create_entdev()
    {
        $user = Auth::user();
        // $this->update_list_of_vehicles($user);

        $rentings = Renting::where('delivered_at','=',null)->orWhere('returned_at')->get();
        if($user->hasRole('Administrador General')){
            $clientes = Client::all();
            $vehicles = Vehicle::all();
        }
        else{
            $rentings = $rentings->filter(function($renting) use ($user)
            {
                return $renting->getOrgId() == $user->organization_id;
            });
            $clientes = Client::where('organization_id','=', $user->organization_id)->get();
            $vehicles = Vehicle::where('organization_id',$user->organization_id)->get();
        }

        return view('Alquileres.entregasydevoluciones.index',compact('clientes','vehicles','rentings')); 
    }

    public function create_selected_entdev($renting_id)
    {
        $user = Auth::user();
        // $this->update_list_of_vehicles($user);

        $rentings = Renting::where('delivered_at','=',null)->orWhere('returned_at')->get();
        if($user->hasRole('Administrador General')){
            $clientes = Client::all();
            $vehicles = Vehicle::all();
        }
        else{
            $rentings = $rentings->filter(function($renting) use ($user)
            {
                return $renting->getOrgId() == $user->organization_id;
            });
            $clientes = Client::where('organization_id','=', $user->organization_id)->get();
            $vehicles = Vehicle::where('organization_id',$user->organization_id)->get();
        }

        $renting = Renting::find($renting_id);

        return view('Alquileres.entregasydevoluciones.seleccionado',compact('clientes','vehicles','rentings'),compact('renting')); 
    }

    public function store_entdev(Request $request, $renting_id)
    {
        $input = $request->all();
        try {
            $renting = Renting::find($renting_id);

            if($input['option_selected']!="ninguno"){
                if($input['option_selected']=="Entrega")
                {
                    if(isset($input['delivered_returned_onTime'])){
                        $renting->delivered_at = $renting->starts_at;

                    }
                    else{
                        $renting->delivered_at = Carbon::now();
                    }

                }
                elseif($input['option_selected']=="Devolución"){
                    if(isset($input['delivered_returned_onTime'])){
                        $renting->returned_at = $renting->finishes_at;

                    }
                    else{
                        $renting->returned_at = Carbon::now();
                    }
                }
                $renting->save();

                return redirect()->action('RentingController@index')->with('stored', 'La Entrega/Devolución fue registrada correctamente.');
            }
            else{
                return redirect()->action('RentingController@create_selected_entdev',['renting_id' => $renting_id])->with('delete', 'Usted debe seleccionar una opción Entrega/Devolución.'); 
            }
        } catch (Exception $e) {
            return redirect()->action('RentingController@create_selected_entdev',['renting_id' => $renting_id])->with('delete', 'Ocurrió un error inesperado, por favor intentelo de nuevo.');
        }
    }


    public function update_list_of_vehicles($user)
    {
        $now = Carbon::now();
        $rentings = Renting::where('returned_at','<=',$now)->get();
        if(!$user->hasRole('Administrador General')){
              $rentings = $rentings->filter(function($renting) use ($user)
              {
                 return $renting->getOrgId() == $user->organization_id;
               });
        }

        foreach ($rentings as $renting) {
            $vehicle = Vehicle::find($renting->vehicle_id);
            $vehicle->mac = null;

            $vehicle->save();
        }
    }


}
