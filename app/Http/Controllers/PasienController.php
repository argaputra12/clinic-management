<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.data-pasien', compact('pasien'));
    }

    public function create()
    {
        return view('admin.tambah-pasien');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        if (!$validated) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        // insert pasien
        $pasien = Pasien::create($request->all());

        if (!$pasien) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        return redirect()->route('pasien.index')
            ->with('success', 'Pasien berhasil ditambahkan.');
    }

    public function show(Request $request)
    {
        $pasien = Pasien::find($request->id);

        return view('components.modal-pasien', compact('pasien'));
    }

    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();

        return redirect()->route('pasien.index')
            ->with(['success' => 'Pasien berhasil dihapus.']);
    }

    public function edit($id)
    {
        $pasien = Pasien::find($id);
        return view('admin.edit-pasien', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
        ]);

        if (!$validated) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        $pasien = Pasien::find($id);
        $pasien->update($request->all());

        return redirect()->route('pasien.index')
            ->with('success', 'Pasien berhasil diupdate.');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $pasien = Pasien::where('nama_pasien', 'like', "%" . $search . "%")->paginate(10);

        return view('admin.data-pasien', compact('pasien'));
    }
}