<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Sessions; // Assuming 'Booking' is your model for sessions
use App\Models\Booking;

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
        $clients = Client::all(); // Fetch all clients

        $bookedSessions = Sessions::where('status', '=', 'booked')->count();
        $completedSessions = Sessions::where('status', '=', 'completed')->count();
        $upcomingSessions = Sessions::where('status', '=', 'upcoming')->count(); // Fetch upcoming sessions

        return view('client.home', compact(
            'clients',
            'bookedSessions',
            'completedSessions',
            'upcomingSessions'
        ));
    }
}
