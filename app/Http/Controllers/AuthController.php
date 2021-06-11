<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showFormLogin()
    {
        return view('admin.login');
    }

    function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    function changePassword()
    {
        $this->userCan('change-password');
        //code chuc nang doi pass
        echo "co quyen";
    }
}
