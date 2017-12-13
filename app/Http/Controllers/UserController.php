<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use DB;
use Auth;
use Hash;
use Session;
use Redirect;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserProfileRequest;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

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
        return view('Usuarios.perfil.index');
    }

    public function create()
    {
        $roles = Role::all();


        $user = Auth::user();
        if(!$user->hasRole('Administrador General')){
            $roles = $user->roles;
        }
        $id_organizations = $user->getOrganizationsList();
        $organizations=Organization::wherein('id',$id_organizations)->get();

        return view('Seguridad.nuevo_usuario.index',compact('roles','organizations'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $input = $request->all();
        if($input['org_id']!=-1){
            if($input['role_name']!="ninguno"){
                DB::beginTransaction();
                try {
                    //Creo el nuevo usuario
                    $user = new User();
                    $user->name = $input['name'];
                    $user->email = $input['email'];
                    $user->password = bcrypt($input['password']);
                    $user->organization_id = $input['org_id'];
                    $user->password_updated_at = Carbon::now();
                    $user->save();

                    //Asigno el rol especificado
                    $user->assignRole($input['role_name']);

                    
                } catch (Exception $e) {
                    DB::rollback();
                    return redirect()->action('UserController@create')->with('delete', 'No se registró el Usuario correctamente.'); 
                }
                DB::commit();
                return redirect()->action('HomeController@index')->with('stored', 'Se registró el Usuario correctamente.'); 
            }
            else{
                return redirect()->action('UserController@create')->with('delete', 'Usted debe seleccionar un rol de usuario.'); 
            }
        }
        else{
            return redirect()->action('UserController@create')->with('delete', 'Usted debe seleccionar una organización.'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_password()
    {
        return view('Seguridad.password.changepassword');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post_change_password(ChangePasswordRequest $request)
    {
         try {
            // $user = Auth::user();
            if(Hash::check($request['password_current'],Auth::user()->password))
            {
                $user=new User;
                $user->where('email','=',Auth::user()->email)
                     ->update(['password' => bcrypt($request['password'])]);

                $user->where('email','=',Auth::user()->email)
                     ->update(['password_updated_at' => Carbon::now()]);

                Session::flash('message','Su contraseña ha sido cambiada con éxito');
                
                return Redirect::to('/')->with('stored','Su contraseña ha sido cambiada con éxito');
            }
            else{
                // Session::flash('message-error','Contraseña incorrecta');
                return Redirect::to('cambiar/password')->with('delete','Su contraseña es incorrecta');
            }
         } catch (Exception $e) {
             return Redirect::to('/')->with('delete','Su contraseña no ha sido cambiada con éxito');
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_edit_profile()
    {
        return view('Usuarios.perfil.edit_user');
    }

    public function update_profile(Request $request)
    {

        $this->validate($request, [
            'email' => 'unique:users,email,'.Auth::user()->id
        ]);
        $input = $request->all();
        
        $user = Auth::user();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->save();
        return redirect()->action('UserController@show_profile')->with('stored', 'Se actualizó el perfil de usuario correctamente.'); 
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
