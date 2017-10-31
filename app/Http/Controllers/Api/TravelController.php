<?php

namespace App\Http\Controllers\Api;

use App\Models\Travel;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use JWTAuth;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = JWTAuth::parseToken()->authenticate();
        $travels = $client->travels()->get();

        return response()->json($travels);
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
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        $vehicle = Vehicle::find($request['vehicle_id']);
        $client = JWTAuth::parseToken()->authenticate();
        $pastTravels = $client->activeTravels()->get();

        if ($pastTravels->count() > 0) {
            return response()->json(['errors' => [
                'travel' => [
                    'User has an active travel'
                ]
            ]], 422);
        }

        if ($vehicle->organization()->get()->first()->id != $client->organization()->get()->first()->id) {
            return response()->json(['errors' => [
                'vehicle_id' => [
                    'Vehicle doesn\'t belong to the same organization'
                ]
            ]], 422);
        }

        $travel = new Travel;
        $travel['started_at'] = Carbon::now();
        $travel['client_id'] = $client->id;
        $travel['vehicle_id'] = $request['vehicle_id'];

        $travel->save();

        return response()->json($travel);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function show(Travel $travel)
    {
        $authClient = JWTAuth::parseToken()->authenticate();
        $travelClient = $travel->client()->get()->first();

        if ($authClient->id != $travelClient->id) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($travel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Travel $travel)
    {
        $authClient = JWTAuth::parseToken()->authenticate();
        $travelClient = $travel->client()->get()->first();

        if ($authClient->id != $travelClient->id) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if (is_null($travel['ended_at'])) {
            $travel['ended_at'] = Carbon::now();
            $travel->save();
    
            return response()->json($travel);
        }

        return response()->json(['error' => 'Travel already ended'], 422);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Travel $travel)
    {
        //
    }
}
