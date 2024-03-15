<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionsRequest;
use App\Http\Requests\UpdateSessionsRequest;
use App\Models\Client;
use App\Models\Sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\Counselor;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_client_id = Client::select('id')
            ->where('UserId', Auth::user()->id)
            ->first();

        $bookings = Sessions::join('counselors', 'sessions.CounselorId', '=', 'counselors.id')
            ->join('programs', 'sessions.ProgramId', '=', 'programs.id')
            ->select('counselors.Name as counselor', 'sessions.ClientId as client', 'programs.Name as session', 'sessions.Duration', 'sessions.Date')
            ->where('ClientId', $get_client_id->id)
            ->where('sessions.Status', 'Approved')
            ->paginate(3);

        $present_sessions = Sessions::join('counselors', 'sessions.CounselorId', '=', 'counselors.id')
            ->join('programs', 'sessions.ProgramId', '=', 'programs.id')
            ->select('counselors.Name as counselor', 'sessions.ClientId as client', 'programs.Name as session', 'sessions.Attendance', 'sessions.Duration', 'sessions.Date')
            ->where('ClientId', $get_client_id->id)
            ->where('sessions.Status', 'Present')
            ->get();

        $programs = Program::join('counselors', 'programs.CounselorId', '=', 'counselors.id')
            ->select('counselors.id As counselorId', 'counselors.Name As counselor', 'programs.Name As program', 'programs.Day', 'programs.Duration', 'programs.Price')
            ->paginate(3);

        return view('index', compact('bookings', 'present_sessions', 'programs'));
    }

    public function bookSession()
    {
        $programs = Program::join('counselors', 'programs.CounselorId', '=', 'counselors.id')
            ->select('counselors.id As counselorId', 'counselors.Name As counselor', 'programs.id', 'programs.Name As program', 'programs.Day', 'programs.Duration', 'programs.Price')
            ->get();

        $get_client_id = Client::select('id')
            ->where('UserId', Auth::user()->id)
            ->first();

        $counselors = Counselor::select('id', 'Name')->get();
        Log::info($counselors);

        return view('/book-session', compact('programs', 'get_client_id', 'counselors'));
    }

    public function sessions()
    {
        $get_client_id = Client::select('id')
            ->where('UserId', Auth::user()->id)
            ->first();

        $allSessions = Sessions::join('counselors', 'sessions.CounselorId', '=', 'counselors.id')
            ->join('programs', 'sessions.ProgramId', '=', 'programs.id')
            ->select('counselors.Name as counselor', 'sessions.ClientId as client', 'programs.Name as session', 'sessions.Duration', 'sessions.Date', 'sessions.Status', 'sessions.Attendance')
            ->where('ClientId', $get_client_id->id)
            ->get();

        return view('sessions', compact('allSessions'));
    }

    public function approvedSessions()
    {
        $get_counselor_id = Counselor::select('id')
            ->where('UserId', Auth::user()->id)
            ->first();
    
        $allSessions = Sessions::join('counselors', 'sessions.CounselorId', '=', 'counselors.id')
            ->join('clients', 'sessions.ClientId', '=', 'clients.id')
            ->join('programs', 'sessions.ProgramId', '=', 'programs.id')
            ->select('counselors.Name as counselor', 'sessions.ClientId as clientId', 'clients.Name as client', 'sessions.id', 'programs.Name as session', 'sessions.Duration', 'sessions.Date', 'sessions.Status',
                'sessions.ProgramId', 'sessions.Attendance')
            ->where('sessions.CounselorId', $get_counselor_id->id)
            ->where('sessions.Status', 'Approved')
            ->orderby('sessions.created_at', 'DESC')
            ->get();
    
        return view('Counselor/Sessions', compact('allSessions'));
    }
    
    public function mark_attendance(Request $request, Sessions $id)
    {
        $session = Sessions::where('id', $id->id)
            ->update([
                'Attendance' => $request->Attendance
            ]);
    
        return redirect()->back()->with('success', 'Attendance Updated');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ... (Your code to display the form for creating a new session)
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreSessionsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request);
        $this->validate($request, [
            'Program' => 'required',
            'Counselor' => 'required', // Might need to update from 'Trainer'
            'Date' => 'required',
            'Duration' => 'required',
        ]);
    
        $session = new Sessions;
    
        $session->ClientId = $request->input('ClientId');
        $session->ProgramId = $request->input('Program');
        $session->CounselorId = $request->input('Counselor'); // Might need to update from 'TrainerId'
        $session->Date = $request->input('Date');
        $session->Duration = $request->input('Duration');
    
        $session->save();
    
        return redirect('bookings')->with('success', 'Session booked successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Sessions $sessions
     * @return \Illuminate\Http\Response
     */
    public function show(Sessions $sessions)
    {
        // ... (Your code to display details of a specific session)
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Sessions $sessions
     * @return \Illuminate\Http\Response
     */
    public function edit(Sessions $sessions)
    {
        // ... (Your code to display the form for editing a session)
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSessionsRequest $request
     * @param \App\Models\Sessions $sessions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSessionsRequest $request, Sessions $sessions)
    {
        // ... (Your code to update a session based on request data)
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sessions $sessions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sessions $sessions)
    {
        // ... (Your code to delete a session)
    }

}