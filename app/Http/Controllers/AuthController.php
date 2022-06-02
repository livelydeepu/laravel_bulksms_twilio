<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user_is_loggedin = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->password);

        if($user_is_loggedin)
        {
            return redirect()->route('show')->with('success', 'Login Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Incorrect Credential');
        }
    }
}
