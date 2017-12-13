<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Configuration;
use App\Models\Vehicle;
use App\Models\Sensor;
use App\Models\Reading;
use App\Models\Renting;
use App\Models\Client;
use App\Models\Travel;
use App\Models\Position;
use App\Models\Organization;
use Auth;
use Redirect;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
        $current_date = Carbon::now();

        $last_date_of_update =  Carbon::createFromFormat('Y-m-d H:i:s',Auth::user()->password_updated_at);
        $conf = new Configuration();
        $num_dias = $conf->getParameter('daystochangepassword',Auth::user()->organization_id);

        if($current_date->diffInDays($last_date_of_update)>=$num_dias){
            $pass_changed=false;
            return view('Seguridad.password.changepassword',compact('pass_changed'));
        }
        else{
            return view('dashboard');
        }

    }

    public function auto()
    {
        // return view('home');
        return view('Vehiculos.ver-vehiculo');
    }

    public function show_profile()
    {
        return view('Usuarios.perfil.ver-perfil');
    }

        public function VehiculosPrincipal()
    {
        return view('Vehiculo.index');
    }
    
    public function clienteXvehiculo(Request $request,$id_travel,$id_vehiculo)
    {
        //Auth::user()->email
        $sensors=Sensor::all();

        $vehicle= Vehicle::find($id_vehiculo);
        //$reading= Reading::all();
        $reading= Reading::where('travel_id','=',$id_travel)->get();
        $readinglist= Reading::where('travel_id','=',$id_travel)->where('sensor_id','=',1);
        $travel = Travel::find($id_travel);
        $positions = Position::where('vehicle_id','=',$id_vehiculo)->where('created_at','>=',$travel->started_at)->where('created_at','<=',$travel->ended_at)->get();
        $papeletas= DB::table('readings')->where('travel_id','=',$id_travel)->where('sensor_id','=',11)->get();
        $num_papeletas = DB::table('readings')

                ->select(DB::raw("count(sensor_id) as total"))->where('travel_id','=',$id_travel)->where('sensor_id','=',11)->get();

        $input = $request->all();
        
        $sensorselected = Sensor::find(1);

        $inicio=Carbon::parse($travel->ended_at);
        $fin=Carbon::parse($travel->started_at);

        

        $horas_alquiler = $fin->diffInHours($inicio)*$vehicle->price;

        
        return view('Reportes.clienteXVehiculo', compact('sensors','vehicle','reading','readinglist','sensorselected','papeletas','num_papeletas','horas_alquiler','positions'),compact('travel'));
    }

    public function clienteXvehiculoPostMet(Request $request,$id_travel,$id_vehiculo)
    {
        
        $input = $request->all();
        $vehicles= Vehicle::all();
        $vehicle= Vehicle::find($id_vehiculo);
        $sensors= Sensor::all();
        
        $travel = Travel::find($id_travel);

        $positions = Position::where('vehicle_id','=',$id_vehiculo)->where('created_at','>=',$travel->started_at)->where('created_at','<=',$travel->ended_at)->get();

        $papeletas= DB::table('readings')->where('travel_id','=',$id_travel)->where('sensor_id','=',11)->get();
        $num_papeletas = DB::table('readings')
                ->select(DB::raw("count(sensor_id) as total"))->where('travel_id','=',$id_travel)->where('sensor_id','=',11)->get();
        

        //$input['vehicle_id']
        //$input['fechaInicial']        
        //$input['fechaFin']
        //$input['sensor_id'];
        //dd($input);

        if($input['sensor_id']!="" && $input['sensor_id']!="Elija una opción"){
            $sensorselected = Sensor::find($input['sensor_id']);
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']]
                ])
                ->where('travel_id','=',$id_travel)
                ->get();
                //dd($readinglist);
        }else{
            $sensorselected = Sensor::find('1');
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', '1']
                ])
                ->where('travel_id','=',$id_travel)
                ->get();
                //dd($readinglist);
        }

        $inicio=Carbon::parse($travel->ended_at);
        $fin=Carbon::parse($travel->started_at);


        $horas_alquiler = $fin->diffInHours($inicio)*$vehicle->price;
        //dd($input);
        return view('Reportes.clienteXVehiculo', compact('sensors','vehicles','vehicle','reading','sensorselected','readinglist','travel','papeletas','num_papeletas','horas_alquiler','positions'));

    }

    public function infracciones()
    {
        
        
        $travels = Travel::all();
        $readings = Reading::where('sensor_id','=','12')->get();
        //$readings = Reading::all();
        //dd($readings);

        return view('Alquileres.nuevo_infraccion',compact('clientes','vehicles','travels','readings'));
    }

    public function infraccionesPost(Request $request)
    {
        $input = $request->all();
        $readings = Reading::where('sensor_id','=','12')->get();
        //dd($input);
        //if($input['optradio']!="" && $input['descripcion']!=""){
        if($input['optradio']!=""){
            DB::beginTransaction();
            try {
                $reading = new Reading();
                $reading->travel_id = $input['optradio'];
                $reading->sensor_id = '12';

                $reading->description = 'Papeleta 1';

                $reading->save();

            } catch (Exception $e) {
                DB::rollback();
                return redirect()->action('HomeController@infracciones')->with('stored', 'No se registró la infraccion.'); 
            }
            DB::commit();
            return redirect()->action('HomeController@infracciones')->with('stored', 'Se registró la infraccion correctamente.'); 
        }
        else{
            return redirect()->action('HomeController@infracciones')->with('delete', 'Seleccione un viaje y detalle una infraccion'); 
        }
    }

    public function reporte_recorrido_filtro()
    {
        $travel = Travel::all();
        $clientes= Client::all();
        $vehicles= Vehicle::all();
        $renting = Renting::all();
        return view('Reportes.recorridos_filtro', compact('renting','travel','clientes','vehicles'));
    }

    public function reporte_recorrido_filtrado(Request $request)
    {
        
        $clientes= Client::all();
        $vehicles= Vehicle::all();

        $input = $request->all();

        if( $input['client_id'] !="" && $input['vehicle_id']!="")
        {
            $travel= Travel::where('vehicle_id','=',$input['vehicle_id'])->where('client_id','=',$input['client_id'])->get();
        }
        elseif($input['client_id'] !="")
        {
            $travel= Travel::where('client_id','=',$input['client_id'])->get();
        }
        elseif ($input['vehicle_id']!="") {
            $travel= Travel::where('vehicle_id','=',$input['vehicle_id'])->get();
        }

        //dd($travel);
        return view('Reportes.recorridos_filtro', compact('travel','clientes','vehicles'));
        
        // return redirect()->action('RentingController@index',['rentings'=>$rentings,'clientes'=>$clientes,'vehicles'=>$vehicles])->with('stored', 'Se ha filtrado los alquileres correctamente');
    }


    public function asignarauto()
    {
        // return view('home');
        return view('asignarauto');
    }

    public function viajesCliente()
    {
        return view('Reportes.viajesCliente');
    }

public function sensores()
    {
        $vehicles= Vehicle::all();
        $sensors= Sensor::all();
        $travels = Travel::all();
        $sensorselected= Sensor::find('1');
        $readinglist = DB::table('readings')
            ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
            ->where([
                    ['sensor_id','=', '1']
                ])
            ->get();
        return view('Reportes.sensores', compact('vehicles','sensors','readinglist','sensorselected','travels'));
    }

    public function filtrado_sensores(Request $request)
    {
        $vehicles= Vehicle::all();
        $sensors= Sensor::all();
        $travels = Travel::all();
        $input = $request->all();
        //$input['travel_id']
        //$input['fechaInicial']        
        //$input['fechaFin']
        //$input['sensor_id'];
        //dd($input);
        if($input['sensor_id']!="" && $input['travel_id']!="" && $input['fechaInicial']=="" && $input['fechaFin']==""){
            $sensorselected = Sensor::find($input['sensor_id']);
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']],
                    ['travel_id','=', $input['travel_id']]
                ])
                ->get();
        }
        elseif ($input['sensor_id']!="" && $input['travel_id']!="" && $input['fechaInicial']!="" && $input['fechaFin']=="") {
            $sensorselected = Sensor::find($input['sensor_id']);
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']],
                    ['travel_id','=', $input['travel_id']],
                    ['created_at','>',$input['fechaInicial']]
                ])
                ->get();
        }
        elseif ($input['sensor_id']!="" && $input['travel_id']!="" && $input['fechaInicial']=="" && $input['fechaFin']!="") {
            $sensorselected = Sensor::find($input['sensor_id']);
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']],
                    ['travel_id','=', $input['travel_id']],
                    ['created_at','<',$input['fechaFin']]
                ])
                ->get();
        }
        elseif ($input['sensor_id']!="" && $input['travel_id']!="" && $input['fechaInicial']!="" && $input['fechaFin']!="") {
            $sensorselected = Sensor::find($input['sensor_id']);
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']],
                    ['travel_id','=', $input['travel_id']],
                    ['created_at','>',$input['fechaInicial']],
                    ['created_at','<',$input['fechaFin']]
                ])
                ->get();
        }
        //sin travel
        elseif ($input['sensor_id']!="" && $input['travel_id']=="" && $input['fechaInicial']=="" && $input['fechaFin']==""){
            $sensorselected = Sensor::find($input['sensor_id']);
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']]
                ])
                ->get();
        }
        elseif ($input['sensor_id']!="" && $input['travel_id']=="" && $input['fechaInicial']!="" && $input['fechaFin']=="") {
            $sensorselected = Sensor::find($input['sensor_id']);
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']],
                    ['created_at','>',$input['fechaInicial']]
                ])
                ->get();
        }
        elseif ($input['sensor_id']!="" && $input['travel_id']=="" && $input['fechaInicial']=="" && $input['fechaFin']!="") {
            $sensorselected = Sensor::find($input['sensor_id']);
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']],
                    ['created_at','<',$input['fechaFin']]
                ])
                ->get();
        }
        elseif ($input['sensor_id']!="" && $input['travel_id']=="" && $input['fechaInicial']!="" && $input['fechaFin']!="") {
            $sensorselected = Sensor::find($input['sensor_id']);
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']],
                    ['created_at','>',$input['fechaInicial']],
                    ['created_at','<',$input['fechaFin']]
                ])
                ->get();
        }
        else{
            //por defecto
            $sensorselected= Sensor::find('1');
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', '1']
                    ])
                ->get();
        }
        return view('Reportes.sensores', compact('vehicles','sensors','readinglist','sensorselected','travels'));
    }


    public function filtrado_sensores_reporte_postMet(Request $request)
    {
        $vehicles= Vehicle::all();
        $sensors= Sensor::all();

        $input = $request->all();
        $sensorselected = Sensor::find($input['sensor_id']);
        //$input['vehicle_id']
        //$input['fechaInicial']        
        //$input['fechaFin']
        //$input['sensor_id'];
        if($input['sensor_id']!=""){
            $reading = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']]
                ])
                ->get();
        }
        return view('Reportes.clienteXVehiculo', compact('sensors','vehicles','reading','sensorselected'));
    }

    public function filtroAutos()
    {
        return view('Filtros.filtroAutos');
    }

    public function filtroUsuarios()
    {
        return view('Filtros.filtroUsuarios');
    }

    
    public function destroyPutInfracciones($id)
    {
        try {
            DB::beginTransaction();
            //dd($id_available);
            $infracc = Reading::find($id);
            //dd($available);
            $infracc->delete();
            
        } catch (Exception $e) {
            DB::rollback();
                
            return redirect()->action('HomeController@infracciones')->with('stored', 'No se eliminó la infraccion.');
        }
        DB::commit();
        return redirect()->action('HomeController@infracciones')->with('stored', 'Se ha eliminado la infraccion correctamente para el vehículo.'); 

    }
}
