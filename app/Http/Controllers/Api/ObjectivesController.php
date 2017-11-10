<?php

namespace App\Http\Controllers\Api;

use App\Models\Objective;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

class ObjectivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = JWTAuth::parseToken()->authenticate();
        $objectives = $client->objectives()->get();

        return response()->json($objectives);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y',
            'goal' => 'required|numeric',
            'sensor_id' => 'required|exists:sensors,id',
        ]);

        $client = JWTAuth::parseToken()->authenticate();
        $objective = new Objective();

        $objective['starts_at'] = $request['start_date'];
        $objective['ends_at'] = $request['end_date'];
        $objective['goal'] = $request['goal'];
        $objective['value'] = 0;
        $objective['sensor_id'] = $request['sensor_id'];
        $objective['client_id'] = $client->id;

        $objective->save();

        return response()->json($objective);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function show(Objective $objective)
    {
        return response()->json($objective);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objective $objective)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objective $objective)
    {
        //
    }
}
