<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect(route('admin.login.show'));
        }

        return view('admin.layouts.home');
    }
}
