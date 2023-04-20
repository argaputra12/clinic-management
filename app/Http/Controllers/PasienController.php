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
}