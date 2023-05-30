<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class CustomLoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {

        auth()->attempt($request->only('username', 'password'));

        $request->session()->regenerate();

        switch(Auth::user()->role){
            case "admin":
                return redirect()->intended(RouteServiceProvider::HOME);
            case "dokter":
                return redirect()->route('dokter.dashboard');
        }

    }
}