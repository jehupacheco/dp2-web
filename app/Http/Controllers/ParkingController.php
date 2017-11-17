<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $angle = DB::table('readings')
                ->where([
                    ['travel_id','=','5'],
                    ['sensor_id','=','8']
                ])->latest()
                ->first();
            $temperature = DB::table('readings')
                ->where([
                    ['travel_id','=','5'],
                    ['sensor_id','=','4']
                ])->latest()
                ->first();
            $luminosity = DB::table('readings')
                ->where([
                    ['travel_id','=','5'],
                    ['sensor_id','=','9']
                ])->latest()
                ->first();
            $uv = DB::table('readings')
                ->where([
                    ['travel_id','=','5'],
                    ['sensor_id','=','10']
                ])->latest()
                ->first();
            return view('Estacionamiento.index',compact('angle','temperature','luminosity','uv'));
        } catch (Exception $e) {
            return view('/');
        }
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
