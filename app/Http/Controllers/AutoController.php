<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

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

            if($org->slug == 'garden'){
                return view('Autos.auto-jardinero.index');
            }
            elseif($org->slug == 'health'){
                return view('Autos.auto-cardiopatia.index');
            }
            elseif($org->slug == 'sales') {
               return view('Autos.auto-ventas.index');
            }
            elseif($org->slug == 'eco') {
               return view('Autos.auto-ecoamigable.index');
            }
            elseif($org->slug == 'transport1') {
               return view('Autos.auto-transporteUrbano1.index');
            }
            elseif($org->slug == 'transport2') {
               return view('Autos.auto-transporteUrbano2.index');
            }
            else{
                return view('Autos.auto-jardinero.index');
            }

        } catch (Exception $e) {
            return view('Autos.auto-jardinero.index');
        }
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
