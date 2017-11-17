<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

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
        
        return view('dashboard');
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
        return view('Reportes.sensores');
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
