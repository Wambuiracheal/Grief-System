<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramsRequest;
use App\Http\Requests\UpdateProgramsRequest;
use App\Models\Programs;
use App\Models\Clients;
use App\Models\Sessions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Counselor;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Programs::join('','proCounselorId','=','counselor.id')
        ->select('Counselor.id As CounselorId','Counselor.Name As Counselor','programs.id','programs.Name As program','programs.Day','programs.Duration','programs.Price')
        ->get();

        $get_Counselor_id = Counselor::select('id')
        ->where('UserId',Auth::user()->id)
        ->first();

        return view('Counselor/Programs', compact('programs','get_Counselor_id'));
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
     * @param  \App\Http\Requests\StoreProgramsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'ProgramName' => 'required',
            'Day' => 'required',
            'Duration' => 'required',
            'Price' => 'required',

        ]);

        $program = new Programs;

        $program->Name=$request->input('ProgramName');
        $program->CounselorId=$request->input('CounselorId');
        $program->Day=$request->input('Day');
        $program->Duration=$request->input('Duration');
        $program->Price=$request->input('Price');


        Log::info($program);
        $program->save();

        return redirect('Counselor/Programs')->with('success','Program added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Log::info($id);

        $approved = Sessions::join('clients','sessions.ClientId','=','clients.id')
        ->join('programs','sessions.ProgramId','=','programs.id')
        ->select('clients.Name as Name','sessions.Duration','sessions.Date','programs.Name as program','programs.id','sessions.Status','sessions.Attendance')
        ->where('programs.id',$id)
        ->where('sessions.Status','Approved')        
        ->get();

        $pending = Sessions::join('clients','sessions.ClientId','=','clients.id')
        ->join('programs','sessions.ProgramId','=','programs.id')
        ->select('clients.Name as Name','sessions.Duration','sessions.Date','programs.Name as program','programs.id','sessions.Status','sessions.Attendance')
        ->where('programs.id',$id)
        ->where('sessions.Status','Pending')        
        ->get();

        $program = Programs::find($id)
        ->join('counselor','programs.CounselorId','=','counselor.id')
        ->select('programs.id','programs.Name As name','programs.Day','programs.Duration','programs.Price')
        ->where('programs.id',$id)
        ->limit(1)
        ->first();

        return view('Counselor.show_program', compact('program', 'approved','pending'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function edit(Programs $programs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramsRequest  $request
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programs $programs, $id)  // Add $id as argument
    {
        // Access validated data using $request->validated() (if applicable)
        $validatedData = $request->validated();
    
        $program = $programs->find($id);
    
        // ... your update logic here ...
    
        return response()->json([
            'message' => 'Program updated successfully!',
        ]);
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Programs::find($id)->delete();

        return redirect()->back();
    }
}
