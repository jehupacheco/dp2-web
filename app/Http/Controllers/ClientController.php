<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use DB;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Client::paginate(9);
        return view('Clientes.index',compact('clientes'));
    }



    public function show_profile()
    {
        return view('Clientes.perfil.ver-perfil');
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
        return view('Clientes.nuevo_cliente');
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
        DB::beginTransaction();
        try {
            $cliente = new Client();
            $cliente->name = $input['name'];
            $cliente->lastname = $input['lastname'];
            $cliente->phone = $input['phone'];
            $cliente->email = $input['email'];
            $cliente->password = $input['password'];
            $cliente->organization_id = $input['org_id'];
            $cliente->save();
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->action('ClientController@index')->with('stored', 'Se registró el Cliente correctamente.'); 
        }
        DB::commit();
        return redirect()->action('ClientController@index')->with('stored', 'Se registró el Cliente correctamente.'); 
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
