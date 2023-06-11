<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $username = $request->username;

        if(DB::table('users')->where('username', $username)->doesntExist()){
            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ]);
        }

        auth()->attempt($request->only('username', 'password'));

        if (!Auth::check()) {
            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ]);
        }

        $request->session()->regenerate();

        switch(Auth::user()->role){
            case "admin":
                return redirect()->intended(RouteServiceProvider::HOME)->with('success', 'Login berhasil');
            case "dokter":
                return redirect()->route('dokter.dashboard')->with('success', 'Login berhasil');
        }

    }
}