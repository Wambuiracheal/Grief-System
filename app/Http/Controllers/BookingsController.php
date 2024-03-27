<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Counselor;
use Illuminate\Support\Facades\Auth;
use App\Models\Sessions;
use App\Models\Client;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_counselor_id = Counselor::select('id')
        ->where('UserId',Auth::user()->id)
        ->first();

        $bookings = Sessions::join('counselors','sessions.CounselorId','=','counselors.id')
        ->join('clients','sessions.ClientId','clients.id')
        ->join('programs','sessions.ProgramId','=','programs.id')
        ->select('counselors.Name as counselor','clients.Name as client','sessions.Status','sessions.id as id','sessions.ClientId as clientid','sessions.ProgramId','programs.Name as session','sessions.Duration','sessions.Date')
        ->where('counselors.id',$get_counselor_id->id)
        ->where('sessions.Status','Pending')
        ->orderby('sessions.created_at','DESC')
        //->take(3)
        ->get();

        $booking_status = Sessions::select('Status')->get();

        return view('Counselor/Bookings', compact('bookings'));
    }

    public function clientbookings()
    {
        $get_client_id = Client::select('id')
        ->where('UserId',Auth::user()->id)
        ->first();

        $bookings = Sessions::join('counselors','sessions.CounselorId','=','counselors.id')
        ->join('programs','sessions.ProgramId','=','programs.id')
        ->select('counselors.Name as counselor','sessions.ClientId as client','programs.Name as session','sessions.Duration','sessions.Date','sessions.Status')
        ->where('ClientId',$get_client_id->id)
        ->where('sessions.Status','Pending')
        ->get();

        $bookingscount = count($bookings);

        return view('bookings', compact('bookings','bookingscount'));
    }

    public function approvebooking(Request $request,Sessions $id)
    {
        //\Log::info($id);

        $session = Sessions::where('id',$id->id)
        ->update([
            'Status'=>$request->Status
        ]);

        return redirect()->back()->with('success','Training session approved');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $bookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $bookings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $bookings)
    {
        //
    }
}
