<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Auth;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        // $permission = Permission::create(['name' => 'Dashboard']);
        return view('Seguridad.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('Seguridad.roles.nuevo',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $input = $request->all();

            $role = Role::create(['name' => $input['role_name']]);
            $permisos = Permission::all();

            foreach ($permisos as $permiso) {
                if(isset($input['permission'.$permiso->id]))
                    $role->givePermissionTo($permiso->name);
            }  
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->action('RolesController@index')->with('deleted', 'No se registró el rol.');
        }
        DB::commit();
        return redirect()->action('HomeController@index')->with('stored', 'Se registró el rol correctamente.');

        // // $role = Role::findByName('Administrador General');
        // $user = Auth::user();
        // $user->assignRole('Administrador General');
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
