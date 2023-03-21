<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended(route('user.private'));
        }

        $form_fields = $request->only(['email', 'password']);

        if (Auth::attempt($form_fields)) {
            return redirect()->intended(route('user.private'));
        }

        return redirect()->to(route('user.login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }
}
