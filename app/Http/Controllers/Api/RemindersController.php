<?php

namespace App\Http\Controllers\Api;

use App\Models\Reminder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use JWTAuth;

class RemindersController extends Controller
{
    public function transformToSend(Reminder $reminder)
    {
        $reminder['end_date'] = (new Carbon($reminder['ends_at']))->format('d/m/Y');
        $reminder['end_time'] = (new Carbon($reminder['ends_at']))->format('h:i a');

        unset($reminder['ends_at']);

        return $reminder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showPrevious = $request->query('show_previous', 'false');
        $showPrevious = $showPrevious === 'true' ? true : false;
        $count = (int)$request->query('count', 10);
        $page = (int)$request->query('page', 1);

        $client = JWTAuth::parseToken()->authenticate();
        $rawReminders = $client->reminders();

        if (!$showPrevious) {
            $rawReminders = $rawReminders->where('ends_at', '>=', Carbon::now());
        }

        $rawReminders = $rawReminders->skip(($page-1)*$count)->take($count);

        $reminders = $rawReminders->get();

        return response()->json($reminders->map(function($r) {
            return $this->transformToSend($r);
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
            'description' => 'required',
            'end_date' => 'required|date_format:d/m/Y',
            'end_time' => 'required|date_format:h:i a'
        ]);

        $end = Carbon::createFromFormat('d/m/Y h:i a', $request['end_date'].' '.$request['end_time']);
        $end->second = 0;
        $now = Carbon::now();

        if ($end->lt($now)) {
            return response()->json(['errors' => [
                'end_date' => ['End date time can\'t be lower than current time']
            ]], 422);
        }

        $client = JWTAuth::parseToken()->authenticate();
        $reminder = new Reminder();

        $reminder->description = $request['description'];
        $reminder['ends_at'] = $end;
        $reminder['client_id'] = $client->id;

        $reminder->save();

        return response()->json($this->transformToSend(Reminder::find($reminder->id)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        return response()->json($this->transformToSend($reminder));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
        $this->validate($request, [
            'end_date' => 'date_format:d/m/Y',
            'end_time' => 'date_format:h:i a'
        ]);

        $end = new Carbon($reminder['ends_at']);
        $time = Carbon::create(0, 0, 0, $end->hour, $end->minute, 0);

        if ($request->input('end_date', '')) {
            $end = Carbon::createFromFormat('d/m/Y', $request['end_date']);
        }

        if ($request->input('end_time', '')) {
            $time = Carbon::createFromFormat('h:i a', $request['end_time']);
        }

        $end = $end->setTime($time->hour, $time->minute, 0);

        $reminder['ends_at'] = $end;
        $reminder->update($request->all());
        $reminder->save();

        return response()->json($this->transformToSend(Reminder::find($reminder->id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        $reminder->delete();

        return response()->json('OK');
    }
}
