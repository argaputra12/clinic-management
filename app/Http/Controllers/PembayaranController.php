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
        $medis = Medis::all();
        return view('admin.tambah-pembayaran', compact('medis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rekam_medis_id' => 'required',
            'alat_medis' => 'required',
            'administrasi' => 'required',
            'total_bayar' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        $pasien_id = Medis::where('id', $request->rekam_medis_id)->first()->pasien_id;

        $request->merge([
            'pasien_id' => $pasien_id,
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
        $medis = Medis::all();

        return view('admin.edit-pembayaran', compact('pembayaran', 'medis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rekam_medis_id' => 'required',
            'alat_medis' => 'required',
            'administrasi' => 'required',
            'total_bayar' => 'required',
            'metode_pembayaran' => 'required',
        ]);


        $pasien_id = Medis::where('id', $request->rekam_medis_id)->first()->pasien_id;

        $request->merge([
            'pasien_id' => $pasien_id,
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

    public function search(Request $request)
    {
        $pembayaran = Pembayaran::where('pasien_id', 'like', '%' . $request->search . '%')
            ->orWhere('rekam_medis_id', 'like', '%' . $request->search . '%')
            ->orWhere('alat_medis', 'like', '%' . $request->search . '%')
            ->orWhere('administrasi', 'like', '%' . $request->search . '%')
            ->orWhere('total_bayar', 'like', '%' . $request->search . '%')
            ->orWhere('metode_pembayaran', 'like', '%' . $request->search . '%')
            ->orWhereHas('pasien', function ($query) use ($request) {
                $query->where('nama_pasien', 'like', '%' . $request->search . '%');
            })
            ->paginate(10);

        return view('admin.data-pembayaran', compact('pembayaran'));
    }
}