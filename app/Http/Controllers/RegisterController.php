<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect()->to(route('user.private'));
        }

        /*if (Auth::check()) {
            redirect(route('admin.layouts.home'));
        }

        $validate_fields = $request->validate([
            'email' => 'email:FilterEmailValidation|unique:users,email|required',
            'name' => 'required|min:3|max:32',
            'password' => 'required|min:3|max:100|confirmed|regexp:/[a-zA-Z0-9\W_]+/'
        ]);*/

        $validate_fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (User::where('email', $validate_fields['email'])->exists()) {
            return redirect()->to(route('user.registration'))->withErrors([
                'email' => 'Пользователь с таким email уже зарегистрирован',
            ]);
        }

        $user = User::create($validate_fields);

        if ($user) {
            Auth::login($user);

            return redirect()->to(route('user.private'));
        }

        return redirect()->to(route('user.login'))->withErrors([
            'form_error' => 'Произошла ошибка при сохранении пользователя',
        ]);
    }
}
