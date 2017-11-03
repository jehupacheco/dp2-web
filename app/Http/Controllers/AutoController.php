<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Vehicle;
use DB;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrar_lista_tipo($tipo_id)
    {   
        try {


            $org = Organization::find($tipo_id);
            
            $vehiculos = Vehicle::where('organization_id',$tipo_id)->paginate(9);
            return view('Vehiculos.index',compact('vehiculos','org'));
           

        } catch (Exception $e) {
            return view('Autos.auto-jardinero.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tipo_id)
    {

        return view('Vehiculos.nuevo_vehiculo',compact('tipo_id'));
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
            $vehiculo->plate = $input['plate'];
            $vehiculo->price = $input['price'];
            $vehiculo->organization_id = $input['org_id'];
            $vehiculo->save();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->action('AutoController@mostrar_lista_tipo',['tipo_id'=>$tipo_id])->with('delete', 'No se registró el Vehículo correctamente.'); 
        }
        DB::commit();
        return redirect()->action('AutoController@mostrar_lista_tipo',['tipo_id'=>$tipo_id])->with('stored', 'Se registró el Vehículo del tipo '.$org->name.' correctamente.'); 
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
