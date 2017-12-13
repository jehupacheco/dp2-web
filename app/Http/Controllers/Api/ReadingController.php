<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Travel;
use App\Models\Reading;
use App\Models\Sensor;
use App\Models\Vehicle;
use Carbon\Carbon;
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

        $client->currentObjectives()->get()->each(function ($obj) use ($reading) {
            if ($obj['sensor_id'] == $reading['sensor_id']) {
                $obj->readings()->attach($reading->id);
                $obj->value += $reading->value;
                $obj->save();
            }
        });

        return response()->json($reading);
    }

    public function storeParkingReading(Request $request) {
        $this->validate($request, [
            'sensor_id' => 'required|integer|exists:sensors,id',
            'value' => 'required|numeric',
        ]);

        $client = JWTAuth::parseToken()->authenticate();
        $ip = $request->ip();

        $vehicle = Vehicle::where('mac', $ip)->get()->first();

        if ($vehicle) {
            $now = Carbon::now();
            $travel = new Travel;
            $travel['started_at'] = $now;
            $travel['ended_at'] = $now;
            $travel['client_id'] = $client->id;
            $travel['vehicle_id'] = $vehicle->id;

            $travel->save();

            $sensor = Sensor::find($request->input('sensor_id'));

            $reading = new Reading;
            $reading->value = $request->input('value');
            $reading->travel()->associate($travel);
            $reading->sensor()->associate($sensor);

            $reading->save();
            $readingToSend = Reading::find($reading->id);

            return response()->json([
                'id' => $readingToSend->id,
                'sensor_id' => $readingToSend['sensor_id'],
                'value' => $readingToSend['value'],
                'created_at' => $readingToSend['created_at']->toDateTimeString(),
            ]);

        } else {
            return response()->json(['errors' => [
                'parking' => ['There is no parking matchin origin IP'],
            ]], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reading $reading)
    {
        $sensor = $reading->sensor()->get()->first();

        $reading['sensor_unit'] = $sensor->unit;
        $reading['sensor_code'] = $sensor->code;

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
