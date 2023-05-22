<?php

namespace App\Http\Controllers;

use App\Models\Medis;
use App\Models\Resep;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Termwind\Components\Dd;

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
        $pasien = Pasien::where('id', $request->pasien_id)->first();
        $request->merge([
            'nama_pasien' => $pasien->nama_pasien,
        ]);

        $validate = $request->validate([
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

        try {
            $medis = Medis::create($validate);
            $medis->save();
            dd('berhasil');
        } catch (\Throwable $th) {
            dd($th);
        }

        dd($validate);


        // return redirect()->route('medis.index')
        //     ->with('success', 'Rekam Medis berhasil ditambahkan.');
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
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('components.modals.edit-info-medis', compact('medis', 'pasien', 'dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nama_pasien = Pasien::where('id', $request->pasien_id)->first();

        $request->merge([
            'nama_pasien' => $nama_pasien->nama_pasien,
        ]);

        $request->validate([
            'pasien_id' => 'required',
            'no_rm' => 'required',
            'tanggal_kunjungan' => 'required',
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'tensi' => 'required',
            'keluhan' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
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
        // $reseps = Resep::where('medis_id', $id)->get();

        // foreach ($reseps as $resep) {
        //     $resep_obats = ResepObat::where('resep_id', $resep->id)->get();
        //     foreach ($resep_obats as $resep_obat) {
        //         $resep_obat->delete();
        //     }
        //     $resep->delete();
        // }

        $medis->delete();

        return redirect()->route('medis.index')
            ->with('success', 'Rekam Medis berhasil dihapus.');
    }
}