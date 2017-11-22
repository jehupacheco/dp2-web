<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Datetime;
use Jenssegers\Date\Date;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api.openweathermap.org',
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', '/data/2.5/weather?id=3936456&units=metric&appid=1d984c1d1dea655e8f3a9857e9c8a35a');

        $clima_de_hoy =json_decode($response->getBody()->getContents());
        // dd($clima_de_hoy->main->temp);
        Date::setLocale('es');
        $today = Date::now()->format('l j F Y H:i:s');

        // dd($today);

        return view('Estacionamiento.index', compact('clima_de_hoy','today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
