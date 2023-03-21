<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) : RedirectResponse
    {
        if (Auth::check()) {
            redirect()->intended(route('admin.home'));
        }

//        $credentials = $request->only(['email', 'password']);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }
}
