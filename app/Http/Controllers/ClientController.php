<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Organization;
use DB;
use App\Http\Requests\ClientRequest;
use Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $user = Auth::user();
            if($user->hasRole('Administrador General')){
                $clientes = Client::paginate(9);
            }
            else{
                 $clientes = Client::where('organization_id','=', $user->organization_id)->paginate(9);
            }
            return view('Clientes.index',compact('clientes'));
        } catch (Exception $e) {
            return view('errors.500');
        }
    }



    public function show_profile($cliente_id)
    {
        $cliente = Client::find($cliente_id);

        $rentings = $cliente->lastRentings();


        return view('Clientes.perfil.ver-perfil',compact('cliente','rentings'));
    }


    public function new_client()
    {
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $id_organizations = $user->getOrganizationsList();
        $organizations=Organization::wherein('id',$id_organizations)->get();

        return view('Clientes.nuevo_cliente',compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $input = $request->all();
        if($input['org_id']!="ninguno"){
            DB::beginTransaction();
            try {
                $cliente = new Client();
                $cliente->name = $input['name'];
                $cliente->lastname = $input['lastname'];
                $cliente->phone = $input['phone'];
                $cliente->email = $input['email'];
                $cliente->password = bcrypt($input['password']);
                $cliente->organization_id = $input['org_id'];
                $cliente->save();
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->action('ClientController@index')->with('stored', 'Se registró el Cliente correctamente.'); 
            }
            DB::commit();
            return redirect()->action('ClientController@index')->with('stored', 'Se registró el Cliente correctamente.'); 
        }
        else
            return redirect()->action('ClientController@create')->with('delete', 'Usted debe seleccionar una organización para el cliente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showedit($id)
    {
        $client = Client::find($id);

        return view('Clientes.edit_client',compact('client'));
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
        $input = $request->all();
        $client = Client::find($id);
        try {
            $client->name = $input['name'];
            $client->lastname = $input['lastname'];
            $client->email = $input['email'];
            $client->phone = $input['phone'];

            $client->save();

            return redirect()->action('ClientController@index')->with('stored', 'Se actualizó el Cliente de manera correcta.'); 
        } catch (Exception $e) {

            return redirect()->action('ClientController@index')->with('eliminate', 'No se actualizó el Cliente de manera correcta.'); 
        }
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
