<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        if ($response === Password::PASSWORD_RESET) {
            return back()->with('status', __($response));
        }

        return back()->withErrors(['email' => __($response)]);
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.passwords.reset', compact('token'));
    }

    public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect(route('login'))->with('status', __($response));
        }

        return back()->withErrors(['email' => __($response)]);
    }
}
