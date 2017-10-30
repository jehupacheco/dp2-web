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
        $this->validate($request, [
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        $vehicle = Vehicle::find($request['vehicle_id']);
        $client = JWTAuth::parseToken()->authenticate();
        $pastTravels = $client->travels()->where('ended_at', null)->get();

        if ($pastTravels->count() > 0) {
            return response()->json(['error' => 'User has an active travel'], 400);
        }

        if ($vehicle->organization()->get()->first()->id != $client->organization()->get()->first()->id) {
            return response()->json(['error' => 'Vehicle doesn\'t belong to the same organization'], 400);
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
        if (is_null($travel['ended_at'])) {
            $travel['ended_at'] = Carbon::now();
            $travel->save();
    
            return response()->json($travel);
        }

        return response()->json(['error' => 'Travel already ended'], 400);
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
