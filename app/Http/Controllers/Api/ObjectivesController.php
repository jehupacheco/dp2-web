<?php

namespace App\Http\Controllers\Api;

use App\Models\Objective;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use JWTAuth;

class ObjectivesController extends Controller
{
    public function transformToSend(Objective $objective)
    {
        $objective['start_date'] = (new Carbon($objective['starts_at']))->format('d/m/Y');
        $objective['end_date'] = (new Carbon($objective['ends_at']))->format('d/m/Y');

        unset($objective['starts_at']);
        unset($objective['ends_at']);

        return $objective;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showPrevious = $request->query('show_previous', 'false');
        $finished = $request->query('finished', '');
        $showPrevious = $showPrevious === 'true' ? true : false;
        $count = (int)$request->query('count', 10);
        $page = (int)$request->query('page', 1);

        $client = JWTAuth::parseToken()->authenticate();
        $rawObjectives = $client->objectives();

        if (!$showPrevious) {
            $rawObjectives = $rawObjectives->where('ends_at', '>=', Carbon::now());
        }

        if ($finished != '') {
            $showFinished = $finished === 'true' ? true : false;

            if ($showFinished) {
                $rawObjectives = $rawObjectives->whereColumn('goal', '<=', 'value');
            } else {
                $rawObjectives = $rawObjectives->whereColumn('goal', '>', 'value');
            }
        }

        $rawObjectives = $rawObjectives->skip(($page-1)*$count)->take($count);

        $objectives = $rawObjectives->get();

        return response()->json($objectives->map(function($o) {
            return $this->transformToSend($o);
        }));
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
            'description' => 'required',
        ]);

        // Validate Time Range
        $start = Carbon::createFromFormat('d/m/Y', $request['start_date'])->setTime(0, 0, 0);
        $end = Carbon::createFromFormat('d/m/Y', $request['end_date'])->setTime(0, 0, 0);
        $now = Carbon::now()->setTime(0, 0, 0);

        if ($start->lt($now)) {
            return response()->json(['errors' => [
                'start_date' => ['Start date can\'t be lower than current date']
            ]], 422);
        }

        if ($end->lt($start)) {
            return response()->json(['errors' => [
                'end_date' => ['End date can\'t be lower than start date']
            ]], 422);
        }

        $client = JWTAuth::parseToken()->authenticate();
        $objective = new Objective();
        
        $objective['starts_at'] = $start;
        $objective['ends_at'] = $end->setTime(23, 59, 59);
        $objective['goal'] = $request['goal'];
        $objective['description'] = $request['description'];
        $objective['value'] = 0;
        $objective['sensor_id'] = $request['sensor_id'];
        $objective['client_id'] = $client->id;

        $objective->save();

        return response()->json($this->transformToSend(Objective::find($objective->id)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function show(Objective $objective)
    {
        return response()->json($this->transformToSend($objective));
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
        $this->validate($request, [
            'end_date' => 'date_format:d/m/Y',
            'goal' => 'numeric',
            'sensor_id' => 'exists:sensors,id',
        ]);

        $allInputs = $request->all();

        if ($request->input('end_date', '')) {
            $start = new Carbon($objective['starts_at']);
            $end = Carbon::createFromFormat('d/m/Y', $request['end_date'])->setTime(0, 0, 0);
            $now = Carbon::now()->setTime(0, 0, 0);

            if ($end->lt($now)) {
                return response()->json(['errors' => [
                    'start_date' => ['End date can\'t be lower than current date']
                ]], 422);
            }

            if ($end->lt($start)) {
                return response()->json(['errors' => [
                    'end_date' => ['End date can\'t be lower than start date']
                ]], 422);
            }

            unset($allInputs['end_date']);
            $allInputs['ends_at'] = $end->setTime(23, 59, 59);
        }

        $objective->update($allInputs);
        $objective->save();

        return response()->json($this->transformToSend(Objective::find($objective->id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objective $objective)
    {
        $objective->delete();

        return response()->json('OK');
    }
}
