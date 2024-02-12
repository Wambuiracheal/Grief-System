<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate(); // Optional: Invalidate the session

    return redirect()->route('login');
}

}
