<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SeatController extends Controller
{
    public function index()
    {
        return Inertia::render('Seats/SeatList');
    }
    public function create()
    {
        $schedules = Schedule::with('event')->get();
        return Inertia::render('Seats/Create',[
            'schedules' => $schedules,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([]);
    }
}
