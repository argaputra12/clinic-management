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
        $users = User::orderBy('created_at', 'desc')->paginate(10);
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

        $validated = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tanggal_lahir' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!$validated){
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        $user = User::create([
            'nik' => $request->nik,
            'username' => $request->username,
            'role' => 'dokter',
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Dokter::create([
            'user_id' => $user->id,
            'nama_dokter' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->role == 'admin') {
            $admin = Admin::where('user_id', $user->id)->first();
            // dd($admin);
            return view('components.modals.detail-info-admin', compact('admin'));
        }
        if ($user->role == 'dokter') {
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

        return view('admin.edit-pengguna', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required|email',
            'username' => 'required',
        ]);

        if(!$validated){
            return redirect()->back()->with('error', 'Data tidak valid');
        }



        $user = User::findOrFail($id);

        if ($user->role == 'admin') {
            $admin = Admin::where('user_id', $user->id)->first();
            $admin->update([
                'nama_admin' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);
        } else {
            $dokter = Dokter::where('user_id', $user->id)->first();
            $dokter->update([
                'nama_dokter' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);
        }

        $user->update([
            'nik' => $request->nik,
            'username' => $request->username,
            'email' => $request->email,
        ]);

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

    public function search(Request $request)
    {
        $search = $request->search;
        $users = User::where('username', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('nik', 'like', '%' . $search . '%')
            ->orWhereHas('dokter', function ($query) use ($search) {
                $query->where('nama_dokter', 'like', '%' . $search . '%');
            })
            ->orWhereHas('admin', function ($query) use ($search) {
                $query->where('nama_admin', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('admin.data-pengguna', compact('users'));
    }
}