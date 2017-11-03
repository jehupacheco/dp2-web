<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_profile()
    {
        return view('Usuarios\perfil\ver-perfil');
    }

    public function create()
    {
        return view('Seguridad.nuevo_usuario.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->password = bcrypt($input['password']);
            $user->organization_id = $input['org_id'];
            $user->save();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->action('UserController@index')->with('stored', 'Se registró el Usuario correctamente.'); 
        }
        DB::commit();
        return redirect()->action('UserController@index')->with('stored', 'Se registró el Usuario correctamente.'); 
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
