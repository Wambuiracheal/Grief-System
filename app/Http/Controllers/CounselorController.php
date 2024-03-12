<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CounselorController extends Controller
{
    public function index(Request $request)
    {
        // ... existing logic to fetch user data ...

        $availableCounselors = Counselor::available()->get(); // Replace with your logic

        return view('dashboard', compact('user', 'availableCounselors'));
    }
}
