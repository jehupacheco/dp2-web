<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Configuration;
use App\Models\Vehicle;
use App\Models\Sensor;
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
        $num_dias = $conf->getParameter('daystochangepassword');
       
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
    
    public function clienteXvehiculo()
    {
        return view('Reportes.vehiculoXusuario');
    }

    public function filtroReporte()
    {
        return view('Reportes.pantallaDeFiltros');
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
        $sensorselected= Sensor::find('1');
        $readinglist = DB::table('readings')
            ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
            ->where([
                    ['sensor_id','=', '1']
                ])
            ->get();

        return view('Reportes.sensores', compact('vehicles','sensors','readinglist','sensorselected'));
    }

    public function filtrado_sensores(Request $request)
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
            $readinglist = DB::table('readings')
                ->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d') as dia"), DB::raw('value as value'), DB::raw('sensor_id as sensor_id'))
                ->where([
                    ['sensor_id','=', $input['sensor_id']]
                ])
                ->get();
        }
        return view('Reportes.sensores', compact('vehicles','sensors','readinglist','sensorselected'));
    }

    public function filtroAutos()
    {
        return view('Filtros.filtroAutos');
    }

    public function filtroUsuarios()
    {
        return view('Filtros.filtroUsuarios');
    }
}
