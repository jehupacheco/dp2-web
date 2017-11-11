<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Travel;
use App\Models\Reading;
use App\Models\Sensor;
use JWTAuth;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = (int)$request->query('count', 10);
        $page = (int)$request->query('page', 1);
        $sensorId = $request->query('sensor_id', '');
        $travelId = $request->query('travel_id', '');

        $client = JWTAuth::parseToken()->authenticate();

        $rawReadings = $client->readings()->latest();

        if ($sensorId != '') {
            $rawReadings = $rawReadings->where('sensor_id', $sensorId);
        }

        if ($travelId != '') {
            $rawReadings = $rawReadings->where('travel_id', $travelId);
        }

        $rawReadings = $rawReadings->skip(($page-1)*$count)->take($count);

        $readings = $rawReadings->get();

        return response()->json($readings);
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
            'sensor_id' => 'required|integer|exists:sensors,id',
            'value' => 'required|numeric',
        ]);

        $client = JWTAuth::parseToken()->authenticate();
        $activeTravels = $client->activeTravels()->get();

        if ($activeTravels->count() == 0) {
            return response()->json(['errors' => [
                'travels' => ['There are no active travels']
            ]], 422);
        }

        $travel = $activeTravels->first();
        $sensor = Sensor::find($request->input('sensor_id'));

        $reading = new Reading;
        $reading->value = $request->input('value');
        $reading->travel()->associate($travel);
        $reading->sensor()->associate($sensor);

        $reading->save();

        return response()->json($reading);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reading $reading)
    {
        return response()->json($reading);
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
