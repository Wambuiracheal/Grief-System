<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Session;

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
        {
            $Clients = Client::all(); // Fetch all clients
    
            // Now you can use $grievingClients in your view (explained later)
    
            return view('client.home', compact('Clients'));
        }
        return view('client.home');

        {
            $upcomingSessions = Session::upcoming()->get(); // Fetch upcoming sessions
    
            // Now you can use $upcomingSessions in your view (explained later)
    
            return view('client.home', compact('upcomingSessions'));
        }

        {
            $bookedSessions = \App\Models\Booking::where('status', '=', 'booked')->count();
            $completedSessions = \App\Models\Booking::where('status', '=', 'completed')->count();
            $upcomingSessions = \App\Models\Booking::where('status', '=', 'upcoming')->count();
            $Clients = \App\Models\Client::count();
    
            return view('client.home', compact('bookedSessions', 'completedSessions', 'upcomingSessions', 'grievingClients'));

            // Option 2: Explicitly passing variables
            $bookedSessions = \App\Models\Booking::where('status', '=', 'booked')->count();
            // ... rest of the code ...
            return view('client.home', [
            'bookedSessions' => $bookedSessions,
            'completedSessions' => $completedSessions,
            'upcomingSessions' => $upcomingSessions,
            'Clients' => $Clients,
            ]);
        
        }

    }
}