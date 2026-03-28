<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $totalEvent = Event::count();
        $upcomingEvents = Event::where('event_date', '>', now())->count();
        $completedEvents = Event::where('event_date', '<', now())->count();

        return Inertia::render('Admin/Dashboard',[
            'totalEvents' => $totalEvent,
            'upcomingEvents' => $upcomingEvents,
            'completedEvents' => $completedEvents,
        ]);
    }
}
