<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        // Your controller logic here
        return view('dashboard'); // Or any other action

        {
            // Fetch booked sessions count
            $bookedSessions = \App\Models\Booking::where('status', '=', 'booked')->count();
    
            // Fetch completed sessions count (similar approach)
            $completedSessions = \App\Models\Booking::where('status', '=', 'completed')->count();
            $upcomingSessions = \App\Models\Booking::where('status', '=', 'upcoming')->count();
            $Clients = \App\Models\Booking::where('status', '=', 'grieving')->count();
    
            // ... repeat for upcoming sessions and grieving clients (if applicable)
    
            return view('home', compact('bookedSessions', 'completedSessions', 'upcomingSessions', 'grievingClients'));
            $bookedSessions = Booking::where('status', 'booked')->count();
            $completedSessions = Booking::where('status', 'completed')->count();
    
            // Upcoming Sessions Logic (assuming upcoming sessions have a future date)
            $today = now();
            $upcomingSessions = Booking::where('date', '>=', $today)->count();
    
            // Grieving Clients Logic (replace with your specific criteria)
            $clients = client::all(); // Replace with your filtering logic
    
            return view('home', compact(
                'bookedSessions',
                'completedSessions',
                'upcomingSessions',
                'clients'
            ));
        }
    }
}