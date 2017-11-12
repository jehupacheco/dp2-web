<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return response()->json(compact('clients'));
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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $authClient = JWTAuth::parseToken()->authenticate();

        if ($client->id != $authClient->id) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $authClient = JWTAuth::parseToken()->authenticate();

        if ($client->id != $authClient->id) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $this->validate($request, [
            'email' => 'email',
            'profile_img_url' => 'url',
            'gender' => 'in:M,F',
            'height' => 'numeric',
            'heart_frecuency' => 'numeric',
            'tools' => 'json',
        ]);

        $client->update($request->all());
        $client->save();

        return response()->json($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
