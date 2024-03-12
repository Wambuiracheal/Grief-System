<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Your controller logic here
        return view('dashboard'); // Or any other action
    }
}