<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Vehicle;
use App\vehicle_available;
use DB;
use App\Http\Requests\VehicleRequest;
use Auth;

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
            $user = Auth::user();
            if($this->verify_if_has_permission($user,$tipo_id)){
                $org = Organization::find($tipo_id);
                
                $vehiculos = Vehicle::where('organization_id',$tipo_id)->paginate(9);
                return view('Vehiculos.index',compact('vehiculos','org'));
            }
            else{
                return redirect()->action('HomeController@index')->with('delete', 'Usted no tiene permiso para realizar esta acción.');
         
            }
        } catch (Exception $e) {
            return view('Autos.auto-jardinero.index');
        }
    }

    public function ver($id)
    {
        $vehiculo = Vehicle::find($id);
        return view('Vehiculos.ver-vehiculo',compact('vehiculo'));
    }

    public function show_profile()
    {
        return view('Autos.ver-perfil');
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

    public function configuracion()
    {
        
        return view('Vehiculos.vehiculos_configuracion');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function configuracionPut(VehicleRequest $request)
    {
        $input = $request->all();
        $org = Organization::find($input['org_id']);
        DB::beginTransaction();
        try {
            $org->vel_max = $input['max_vel'];
            //$org->vel_max = $input['vel_max'];
            $org->save();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->action('AutoController@configuracion')->with('delete', 'Modificación insatisfactoria de parámetros.'); 
        }
        DB::commit();
        return redirect()->action('AutoController@mostrar_lista_tipo',['tipo_id'=>$org->id])->with('stored', 'Los parámetros de la organización '.$org->name.' se MODIFICARON correctamente.'); 
    }

    public function store(VehicleRequest $request,$tipo_id)
    {
        $org = Organization::find($tipo_id);
        $input = $request->all();
        DB::beginTransaction();
        try {
            $vehiculo = new Vehicle();
            $vehiculo->description = $input['description'];
            $vehiculo->plate = $input['plate'];
            $vehiculo->price = $input['price'];
            $vehiculo->mac = strtoupper($input['mac']);
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
    public function showedit($id)
    {
        
        $vehicle = Vehicle::find($id);
        $tipo_id = $vehicle->organization_id;
        return view('Vehiculos.edit_vehicle', compact('vehicle','tipo_id'));

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
            $vehicle->plate = $input['plate'];
            $vehicle->description = $input['description'];
            $vehicle->price = $input['price'];
            $vehicle->mac = $input['mac'];
            $vehicle->max_weight = $input['max_weight'];

            $vehicle->save();

            $tipo_id = $vehicle->organization_id;
            $org = Organization::find($tipo_id);
            return redirect()->action('AutoController@mostrar_lista_tipo',['tipo_id'=>$tipo_id])->with('stored', 'Se actualizó el Vehículo del tipo '.$org->name.' , con identificador'.$vehicle->plate.', de manera correcta.'); 
        } catch (Exception $e) {

            $tipo_id = $vehicle->organization_id;
            $org = Organization::find($tipo_id);
            return redirect()->action('AutoController@mostrar_lista_tipo',['tipo_id'=>$tipo_id])->with('stored', 'No se pudo actualizar el Vehículo del tipo '.$org->name.' de manera correcta.'); 
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

    public function ubicacion($id)
    {
        $vehicle = Vehicle::find($id);
        $positions = $vehicle->positions()->latest()->limit(100)->get();

        return view('Vehiculos.ubicacion', compact('positions', 'vehicle'));
    }
    

    public function deshabilitar($id)
    {
        $vehicle = Vehicle::find($id);
        //$vehicle_available = vehicle_available::all();
        $vehicle_available = vehicle_available::where('id_vehicle','=',$id)->get();
        //dd($vehicle_available);
        return view('Vehiculos.deshabilitar',compact('id','vehicle_available'));
    }


    public function destroyPutAvailability($id_available)
    {
        try {
            DB::beginTransaction();
            //dd($id_available);
            $available = vehicle_available::where('id_available','=',$id_available)->first();
            //dd($available);
            $placa = $available->id_vehicle;
            //dd($available);
            $available->delete();
            
        } catch (Exception $e) {
            DB::rollback();
                
            return redirect()->action('AutoController@deshabilitar',['id' => $placa])->with('stored', 'No se eliminó el período de inactividad del vehículo.');
        }
        DB::commit();
        return redirect()->action('AutoController@deshabilitar',['id' => $placa])->with('stored', 'Se ha eliminado el período de inactividad correctamente para el vehículo.'); 

    }

    public function deshabilitarPut(VehicleRequest $request)
    {

        $input = $request->all();

        DB::beginTransaction();
        try {
            $vehicle_available = new vehicle_available();
            $vehicle_available->id_vehicle = $input['vehicle_id'];
            $vehicle_available->starts_at = $input['start_date'];
            $vehicle_available->finishes_at = $input['end_date'];
            //$vehicle_available->updated_at = $input['start_date'];
            //$vehicle_available->created_at = $input['end_date'];
            $vehicle_available->state = "Inhabilitar";
            $vehicle_available->save();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->action('AutoController@ver',['id'=>$input['vehicle_id']]); 
            //return redirect()->action('AutoController@show_profile'); 
        }
        DB::commit();
        //return view('Vehiculos.deshabilitar',compact('id'));
        return redirect()->action('AutoController@deshabilitar',['id' => $input['vehicle_id']])->with('stored', 'El vehículo '.$input['vehicle_id'].' se DESHABILITÓ satisfactoriamente.'); 
    }


    public function verify_if_has_permission($user,$tipo_id){
        if($user->hasPermissionTo('Vehículos - Todas las Organizaciones')){
                return true;
            }
            elseif($user->hasPermissionTo('Vehículos - Solo su Organización')){
                if($tipo_id==$user->organization_id){
                   return true;
                }   
                elseif($user->hasAnyPermission(['Vehículos para pacientes de Cardiopatía', 
                                            'Vehículos para la Jardinería',
                                            'Vehículos para Ventas',
                                            'Vehículos Eco-amigables',
                                            'Vehículos para Trasporte Urbano 1',
                                            'Vehículos para Trasporte Urbano 2'])){
                        $org = Organization::find($tipo_id);
                        $str_permission = '';
                        switch ($org->slug) {
                            case 'health':
                                $str_permission = 'Vehículos para pacientes de Cardiopatía';
                                break;
                            case 'garden':
                                $str_permission = 'Vehículos para la Jardinería';
                                break;
                            case 'sales':
                                $str_permission = 'Vehículos para Ventas';
                                break;
                            case 'eco':
                                $str_permission = 'Vehículos Eco-amigables';
                                break;
                            case 'transport1':
                                $str_permission = 'Vehículos para Trasporte Urbano 1';
                                break;
                            case 'transport2':
                                $str_permission = 'Vehículos para Trasporte Urbano 2';
                                break;
                            default:
                                $str_permission = 'Vehículos para la Jardinería';
                        }   

                        if($user->hasPermissionTo($str_permission)){
                            return true;
                        }   
                        else{
                            return false;
                        }

                }   
                else{
                    return false;
                }             
            }
            elseif($user->hasAnyPermission(['Vehículos para pacientes de Cardiopatía', 
                                            'Vehículos para la Jardinería',
                                            'Vehículos para Ventas',
                                            'Vehículos Eco-amigables',
                                            'Vehículos para Trasporte Urbano 1',
                                            'Vehículos para Trasporte Urbano 2'])){
                    $org = Organization::find($tipo_id);
                    $str_permission = '';
                    switch ($org->slug) {
                        case 'health':
                            $str_permission = 'Vehículos para pacientes de Cardiopatía';
                            break;
                        case 'garden':
                            $str_permission = 'Vehículos para la Jardinería';
                            break;
                        case 'sales':
                            $str_permission = 'Vehículos para Ventas';
                            break;
                        case 'eco':
                            $str_permission = 'Vehículos Eco-amigables';
                            break;
                        case 'transport1':
                            $str_permission = 'Vehículos para Trasporte Urbano 1';
                            break;
                        case 'transport2':
                            $str_permission = 'Vehículos para Trasporte Urbano 2';
                            break;
                        default:
                            $str_permission = 'Vehículos para la Jardinería';
                    }   
                    if($user->hasPermissionTo($str_permission)){
                        return true;
                    }   
                    else{
                        return false;
                    }

            }
            else
                return false;
    }
}
