<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Counselors;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function profile()
    {
        $get_counselor_id = Client::select('id')
        ->where('UserId',Auth::user()->id)
        ->first();

        //$profile = Counselors::select('Name')->where('id',$get_counselor_id)->get();

        $profile = Client::where('UserId',Auth::user()->id)->first();

        return view('profile', compact('profile'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRecords($id)
    {
        $client = Client::select('Name')
        ->where('id',$id)
        ->first();

        $clientRecords = Sessions::join('clients','sessions.ClientId','clients.id')
        ->join('programs','sessions.ProgramId','programs.id')
        ->select('sessions.ClientId as clientId','clients.Name as client','sessions.id','programs.Name as session','sessions.Duration','sessions.Date','sessions.Status','sessions.Attendance','sessions.ProgramId')
        ->where('sessions.ClientId',$id)
        ->orderby('sessions.created_at','desc')
        ->get();

        return view('/Counselor/client-records', compact('clientRecords','client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $clients)
    {
        //
    }
}
