<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Booking; // Assuming 'Booking' is your model for sessions

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

        $bookedSessions = Booking::where('status', '=', 'booked')->count();
        $completedSessions = Booking::where('status', '=', 'completed')->count();
        $upcomingSessions = Booking::upcoming()->get(); // Fetch upcoming sessions

        return view('client.home', compact(
            'clients',
            'bookedSessions',
            'completedSessions',
            'upcomingSessions'
        ));
    }
}
