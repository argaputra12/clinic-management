<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Medis;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ResepObat;
use Illuminate\Console\View\Components\Component;

class ResepObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resep = Resep::all();
        // dd($resep);

        return view('admin.data-resep-obat', compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obat = Obat::all();
        $medis = Medis::all();
        return view('admin.tambah-resep-obat', compact('obat', 'medis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resep_obat = DB::table('resep_obats')
            ->join('obats', 'resep_obats.obat_id', '=', 'obats.id')
            ->join('reseps', 'resep_obats.resep_id', '=', 'reseps.id')
            ->select('resep_obats.*', 'obats.nama_obat', 'obats.satuan', 'obats.harga')
            ->where('resep_obats.resep_id', $id)
            ->get();

        $total_harga = 0;

        foreach ($resep_obat as $item) {
            $total_harga += $item->harga * $item->jumlah;
        }

        $pasien = DB::table('resep_obats')
            ->join('reseps', 'resep_obats.resep_id', '=', 'reseps.id')
            ->join('rekam_medis', 'reseps.rekam_medis_id', '=', 'rekam_medis.id')
            ->join('pasiens', 'rekam_medis.pasien_id', '=', 'pasiens.id')
            ->select('pasiens.*')
            ->where('resep_obats.resep_id', $id)
            ->first();

        $rekam_medis = DB::table('reseps')
            ->join('rekam_medis', 'reseps.rekam_medis_id', '=', 'rekam_medis.id')
            ->select('rekam_medis.*')
            ->where('reseps.id', $id)
            ->first();

        // return response
        return view('components.modal-obat', compact('resep_obat', 'pasien', 'rekam_medis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete
        $resep = Resep::find($id);
        $resep->delete();

        // return response
        return redirect()->route('resep.index')
            ->with('success', 'Resep berhasil dihapus.');
    }
}
