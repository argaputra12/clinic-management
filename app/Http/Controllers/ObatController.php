<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.data-obat', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah-obat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'satuan' => 'required',
            'harga' => 'required'
        ]);

        // check if obat already exists
        $obat = Obat::where('nama_obat', $request->nama_obat)->andWhere('satuan', $request->satuan)->first();

        if ($obat) {
            return redirect()->back()->withErrors('Obat dengan nama dan satuan tersebut sudah ada');
        }

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $obat = Obat::findOrFail($id);

        return view('components.detail-obat', compact('obat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);

        return view('admin.edit-obat', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_obat' => 'required',
            'satuan' => 'required',
            'harga' => 'required'
        ]);

        Obat::findOrFail($id)->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Obat::destroy($id);

        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus');
    }

    public function search(Request $request)
    {
        $obat = Obat::where('nama_obat', 'like', '%' . $request->search . '%')
        ->orWhere('satuan', 'like', '%' . $request->search . '%')
        ->orWhere('harga', 'like', '%' . $request->search . '%')
        ->paginate(10);

        return view('admin.data-obat', compact('obat'));
    }
}