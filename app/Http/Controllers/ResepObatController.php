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
        $resep = Resep::orderBy('created_at', 'DESC')->paginate(10);
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
        $validate = $request->validate([
            'rekam_medis_id' => 'required',
            'obat' => 'required',
            'jumlah' => 'required',
        ]);

        if (!$validate) {
            return redirect()->back()->withErrors($validate);
        }

        // hitung total harga
        $total_harga = 0;
        foreach ($request->obat as $key => $obat) {
            $harga = DB::table('obats')->where('id', $obat)->first();
            $total_harga += $harga->harga * $request->jumlah[$key];
        }

        $resep = Resep::create([
            'rekam_medis_id' => $request->rekam_medis_id,
            'total_harga' => $total_harga,
        ]);

        foreach ($request->obat as $key => $obat) {
            ResepObat::create([
                'jumlah' => $request->jumlah[$key],
                'obat_id' => $obat,
                'resep_id' => $resep->id,
            ]);
        }

        // return response
        return redirect()->route('resep.index')
            ->with('success', 'Resep berhasil ditambahkan.');
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

        $resep  = Resep::find($id);

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
        return view('components.modal-obat', compact('resep_obat', 'pasien', 'rekam_medis', 'total_harga', 'resep'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medis = Medis::all();
        $obat = Obat::all();
        $resep = Resep::find($id);
        $resep_obat = DB::table('resep_obats')->where('resep_id', $id)->get();

        return view('admin.edit-resep-obat', compact('resep', 'medis', 'obat', 'resep_obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $total_harga = 0;

        // delete all obat in resep
        DB::table('resep_obats')
            ->where('resep_id', $id)
            ->delete();

        // insert obat to resep
        foreach ($request->obat as $key => $obat) {
            ResepObat::create([
                'jumlah' => $request->jumlah[$key],
                'obat_id' => $obat,
                'resep_id' => $id,
            ]);

            $harga = DB::table('obats')->where('id', $obat)->first();
            $total_harga += $harga->harga * $request->jumlah[$key];
        }

        Resep::where('id', $id)
            ->update([
                'rekam_medis_id' => $request->rekam_medis_id,
                'total_harga' => $total_harga,
            ]);

        // return response
        return redirect()->route('resep.index')
            ->with('success', 'Resep berhasil diupdate.');
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

    public function search(Request $request)
    {
        $search = $request->search;

        $resep = Resep::where('id', 'like', "%" . $search . "%")
            ->orWhere('rekam_medis_id', 'like', "%" . $search . "%")
            ->orWhereHas('medis', function ($query) use ($search) {
                $query->whereHas('pasien', function ($query) use ($search) {
                    $query->where('nama_pasien', 'like', "%" . $search . "%");
                });
            })
            ->paginate(10);

        return view('admin.data-resep-obat', compact('resep'));
    }
}