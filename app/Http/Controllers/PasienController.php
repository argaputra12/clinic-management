<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::orderBy('tanggal_kunjungan', 'desc')->paginate(10);
        return view('admin.data-pasien', compact('pasien'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'no_rm' => 'required',
            'tanggal_kunjungan' => 'required',
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'keluhan' => 'required',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')
            ->with('success', 'Pasien berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pasien = Pasien::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $pasien,
        ], 200);
    }

    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();

        return redirect()->route('pasien.index')
            ->with('success', 'Pasien berhasil dihapus.');
    }
}