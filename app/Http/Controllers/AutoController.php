<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            if($tipo_id==1){//Jardinería
                return view('Autos.auto-jardinero.index');
            }
            elseif($tipo_id==2){//Eco-amigable
                return view('Autos.auto-cardiopatia.index');
            }
            elseif($tipo_id==3) {
               return view('Autos.auto-ventas.index');
            }
            elseif($tipo_id==4) {
               return view('Autos.auto-ecoamigable.index');
            }
            elseif($tipo_id==6) {
               return view('Autos.auto-transporteUrbano.index');
            }
            else{
                return view('Autos.auto-jardinero.index');
            }

        } catch (Exception $e) {
            return view('Autos.auto-jardinero.index');
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
