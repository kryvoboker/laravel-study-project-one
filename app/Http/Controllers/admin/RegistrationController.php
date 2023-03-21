<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('admin.layouts.registration');
    }

    public function store(Request $request)
    {
//        dd($request->request);

        if (Auth::check()) {
            return redirect(route('admin.home'));
        }

        $credentials = $request->validate([
            'email' => 'email|unique:users,email|required',
            'name' => 'required|min:3|max:32',
            'password' => 'required|min:6|max:100|confirmed|regex:/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/',
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
