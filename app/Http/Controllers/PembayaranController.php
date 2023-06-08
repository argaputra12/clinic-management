<?php

namespace App\Http\Controllers;

use App\Models\Medis;
use App\Models\Pasien;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.data-pembayaran', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasien = Pasien::all();
        $medis = Medis::all();
        return view('admin.tambah-pembayaran', compact('pasien', 'medis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'rekam_medis_id' => 'required',
            'alat_medis' => 'required',
            'administrasi' => 'required',
            'total_bayar' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pasien = Pasien::all();
        $medis = Medis::all();

        return view('admin.edit-pembayaran', compact('pembayaran', 'pasien', 'medis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pasien_id' => 'required',
            'rekam_medis_id' => 'required',
            'alat_medis' => 'required',
            'administrasi' => 'required',
            'total_bayar' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($request->all());

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Pembayaran::destroy($id);

        return redirect()->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus');
    }
}