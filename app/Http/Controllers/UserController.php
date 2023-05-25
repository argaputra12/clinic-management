<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Dokter;
use Faker\Provider\ar_EG\Company;
use Termwind\Components\Dd;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);
        return view('admin.data-pengguna', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.tambah-pengguna');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('user.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        if($user->role == 'admin'){
            $admin = Admin::where('user_id', $user->id)->first();
            // dd($admin);
            return view('components.modals.detail-info-admin', compact('admin'));
        }
        if($user->role == 'dokter'){
            $dokter = Dokter::where('user_id', $user->id)->first();
            return view('components.modals.detail-info-dokter', compact('dokter'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('components.modals.edit-pengguna', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required',
            'email' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('user.index')
            ->with('success', 'Pengguna berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Pengguna berhasil dihapus.');
   }
}