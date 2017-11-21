<?php

namespace App\Http\Controllers\Api;

use App\Models\Position;
use App\Models\Vehicle;
use App\Events\PositionStored;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'vehicle_mac' => 'required|exists:vehicles,mac',
        ]);

        $count = (int)$request->query('count', 10);
        $page = (int)$request->query('page', 1);

        $vehicle = Vehicle::where('mac', $request->query('vehicle_mac'))->get()->first();
        $rawPositions = $vehicle->positions()->latest()->skip(($page-1)*$count)->take($count);

        return response()->json($rawPositions->get());
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
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'vehicle_mac' => 'required|exists:vehicles,mac',
        ]);

        $position = new Position();
        $vehicle = Vehicle::where('mac', $request->input('vehicle_mac'))->get()->first();
        $position->latitude = $request['latitude'];
        $position->longitude = $request['longitude'];

        $vehicle->positions()->save($position);

        event(new PositionStored($vehicle, $position));

        return response()->json(Position::find($position->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        return response()->json($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
}
