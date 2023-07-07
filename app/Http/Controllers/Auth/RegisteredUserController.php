<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'nik' => ['required', 'string', 'max:255', 'unique:'.User::class, 'min:16', 'max:16', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'no_hp' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'max:255'],
        ]);

        if(!$validated){
            return back()->withErrors($validated);
        }

        $user = User::create([
            'nik' => $request->nik,
            'role' => $request->role,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        if($request->role == 'dokter')
        {
            $dokter = [
              'user_id' => $user->id,
              'nama_dokter' => $request->name,
              'jenis_kelamin' => $request->jenis_kelamin,
              'alamat' => $request->alamat,
              'no_telp' => $request->no_hp,
              'tanggal_lahir' => $request->tanggal_lahir,
            ];

            $user->dokter()->create($dokter);

        }

        else if($request->role == 'admin')
        {
            $admin = [
                'user_id' => $user->id,
                'nama_admin' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_hp,
                'tanggal_lahir' => $request->tanggal_lahir,
            ];

            $user->admin()->create($admin);
        }

        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Registrasi berhasil');
    }
}
