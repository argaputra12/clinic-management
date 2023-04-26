<?php

namespace App\Http\Controllers;

use App\Models\Medis;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medis = Medis::orderBy('tanggal_kunjungan', 'desc')->paginate(10);
        return view('admin.data-rekam-medis', compact('medis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('components.modals.tambah-info-medis', compact('pasien', 'dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'no_rm' => 'required',
            'tanggal_kunjungan' => 'required',
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'tensi' => 'required',
            'keluhan' => 'required',
            'diagonsa' => 'required',
            'tindakan' => 'required',
            'nama_dokter' => 'required',
        ]);

        Medis::create($request->all());

        return redirect()->route('medis.index')
            ->with('success', 'Rekam Medis berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medis = Medis::find($id);
        // return component
        return view('components.modals.detail-info-medis', compact('medis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medis = Medis::find($id);
        return view('components.modals.edit-info-medis', compact('medis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pasien_id' => 'required',
            'no_rm' => 'required',
            'tanggal_kunjungan' => 'required',
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'tenis' => 'required',
            'keluhan' => 'required',
            'diagonsa' => 'required',
            'tingdakan' => 'required',
            'nama_dokter' => 'required',
        ]);

        $medis = Medis::find($id);
        $medis->update($request->all());

        return redirect()->route('medis.index')
            ->with('success', 'Rekam Medis berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medis = Medis::find($id);
        $medis->delete();

        return redirect()->route('medis.index')
            ->with(['success' => 'Rekam Medis berhasil dihapus.']);
    }
}