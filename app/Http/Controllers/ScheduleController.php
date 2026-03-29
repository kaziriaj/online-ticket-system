<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('event')->get();
        return Inertia::render('Schedule/ScheduleList', [
            'schedules' => $schedules,
        ]);
    }

    public function create()
    {
        $events = Event::latest()->get();
        return Inertia::render('Schedule/Create', [
            'events' => $events,
        ]);
    }

    public function store(Request $request)
    {
       $request->validate([
            'event_id' => 'required|exists:events,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $request['start_time'] = $request['start_time'] . ':00';
        $request['end_time'] = $request['end_time'] . ':00';

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success','Schedule Created Successfully');
    }

    public function edit(Schedule $schedule)
    {
        return Inertia::render('Schedule/Edit',[
            'schedule' => $schedule,
            'events' => Event::all(),
        ]);
    }

    public function update(Request $request, Schedule $schedule)
    {
       $data= $request->validate([
        'event_id' => 'required|exists:events,id',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i',
        ]);

        $data['start_time'] = $data['start_time'] . ':00';
        $data['end_time'] = $data['end_time'] . ':00';

        $schedule->update($data);
        return redirect()->route('schedules.index')->with('success','Schedule updated Successfully');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success','Schedule updated Successfully');
    }

}
