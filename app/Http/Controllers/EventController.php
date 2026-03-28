<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('user')->orderBy('event_date', 'asc')->get();
        return Inertia::render('Events/EventList',[
            'events' => $events,
        ]);
    }
    public function create()
    {
        return Inertia::render('Events/Create');
    }

    public function store(Request $request)
    {
        $user = auth()->user()->id;
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'location' => 'required',
            'event_price' => 'numeric|min:0',
            'event_date' => 'date',
        ]);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'event_price' => $request->event_price,
            'event_date' => $request->event_date,
            'create_by' => $user
        ]);

        return redirect()->route('events.index')
        ->with('success', 'Event Created Successfully');

    }
}
