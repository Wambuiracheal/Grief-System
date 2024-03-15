<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('client.home');

        {
            $bookedSessions = \App\Models\Booking::where('status', '=', 'booked')->count();
            $completedSessions = \App\Models\Booking::where('status', '=', 'completed')->count();
            $upcomingSessions = \App\Models\Booking::where('status', '=', 'upcoming')->count();
            $grievingClients = \App\Models\Client::count();
    
            return view('client.home', compact('bookedSessions', 'completedSessions', 'upcomingSessions', 'grievingClients'));

            // Option 2: Explicitly passing variables
            $bookedSessions = \App\Models\Booking::where('status', '=', 'booked')->count();
            // ... rest of the code ...
            return view('client.home', [
            'bookedSessions' => $bookedSessions,
            'completedSessions' => $completedSessions,
            'upcomingSessions' => $upcomingSessions,
            'grievingClients' => $grievingClients,
            ]);
        
        }

    }
}