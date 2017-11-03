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
        return view('home');
    }

        public function VehiculosPrincipal()
    {
        return view('Vehiculo.index');
    }

    public function asignarauto()
    {
        // return view('home');
        return view('asignarauto');
    }


}
