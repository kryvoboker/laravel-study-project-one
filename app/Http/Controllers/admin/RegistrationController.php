<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return redirect(route('admin.home'));
        }

        return view('admin.layouts.registration');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email|unique:admin_users,email|required',
            'name' => 'required|min:3|max:32',
            'password' => 'required|min:3|max:100|confirmed',
            'terms' => 'required',
        ]);

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ]);

        if ($user) {
            session()->flash('success', 'Successful registration');

            Auth::login($user);

            return redirect(route('admin.home'));
        }

        return redirect(route('admin.registration.create'))->withErrors([
            'email' => 'Произошла ошибка при регистрации. Скорее всего пользователь с таким email уже зарегистрирован'
        ]);
    }
}
