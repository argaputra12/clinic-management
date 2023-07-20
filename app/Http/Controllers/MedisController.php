<?php

namespace App\Http\Controllers;

use App\Models\Medis;
use App\Models\Resep;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\ResepObat;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function dokterIndex()
    {
        $medis = Medis::orderBy('tanggal_kunjungan', 'desc')->paginate(10);
        return view('dokter.data-rekam-medis', compact('medis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('admin.tambah-rekam-medis', compact('pasien', 'dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'pasien_id' => 'required',
            'dokter_id'=> 'required',
            'tanggal_kunjungan' => 'required',
            'tensi' => 'required',
            'berat_badan' => 'required',
            'keluhan' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
        ]);

        if (!$validate) {
            return redirect()->back()->withErrors($validate);
        }

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
        return view('dokter.detail-rekam-medis', compact('medis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medis = Medis::find($id);
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('admin.edit-rekam-medis', compact('medis', 'pasien', 'dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'pasien_id' => 'required',
            'dokter_id'=> 'required',
            'tanggal_kunjungan' => 'required',
            'tensi' => 'required',
            'keluhan' => 'required',
            'berat_badan' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
        ]);

        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }

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
            ->with('success', 'Rekam Medis berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $medis = Medis::with('pasien', 'dokter')
            ->whereHas('pasien', function($query) use ($search) {
                $query->where('nama_pasien', 'like', "%" . $search . "%");
            })
            ->orWhereHas('dokter', function($query) use ($search) {
                $query->where('nama_dokter', 'like', "%" . $search . "%");
            })
            ->paginate(10);

        return view('admin.data-rekam-medis', compact('medis'));
    }

    public function dokterSearch(Request $request)
    {
        $search = $request->search;
        $medis = Medis::with('pasien', 'dokter')
            ->whereHas('pasien', function($query) use ($search) {
                $query->where('nama_pasien', 'like', "%" . $search . "%");
            })
            ->orWhereHas('dokter', function($query) use ($search) {
                $query->where('nama_dokter', 'like', "%" . $search . "%");
            })
            ->paginate(10);

        return view('dokter.data-rekam-medis', compact('medis'));
    }
}