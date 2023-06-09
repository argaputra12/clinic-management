<?php

namespace App\Http\Controllers;

use App\Models\Medis;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\ServiceProvider;


class LaporanController extends Controller
{
    public function pasienIndex()
    {
        $pasien = Pasien::all();
        return view('admin.laporan.pasien', compact('pasien'));
    }

    public function dokumenPasien(Request $request)
    {
        $pasien = Pasien::where('id', $request->id)->first();
        $jumlah_kunjungan = 0;

        if(Medis::where('pasien_id', $request->id)->orderBy('created_at', 'desc')->count() !== 0)
        {
            $rekam_medis = Medis::where('pasien_id', $request->id)->orderBy('created_at', 'desc')->get();
            $jumlah_kunjungan = Medis::where('pasien_id', $request->id)->count();
            $pdf = Pdf::loadView('admin.laporan.dokumen-pasien', compact('pasien', 'rekam_medis', 'jumlah_kunjungan'));
            $pdf->setPaper('a4', 'potrait');
            return $pdf->stream();
        }

        else
        {
            $rekam_medis = [
                'id' => '',
                'dokter_id' => '',
                'pasien_id' => '',
                'keluhan' => '',
                'diagnosa' => '',
                'tindakan' => '',
                'obat' => '',
                'created_at' => '',
                'updated_at' => '',
            ];
            $pdf = Pdf::loadView('admin.laporan.dokumen-pasien', compact('pasien', 'rekam_medis', 'jumlah_kunjungan'));
            $pdf->setPaper('a4', 'potrait');
            return $pdf->stream();
        }

    }

    public function kunjunganIndex()
    {
        return view('admin.laporan.kunjungan');
    }

    public function dokumenKunjungan(Request $request)
    {
        if($request->time == '1')
        {
            $rekam_medis = Medis::where('created_at', '>=', date('Y-m-d', strtotime('-1 day')))->get();
            $pdf = Pdf::loadView('admin.laporan.dokumen-kunjungan', compact('rekam_medis', 'jumlah_kunjungan'));
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream();
        }

        if($request->time == '7')
        {
            $rekam_medis = Medis::where('created_at', '>=', date('Y-m-d', strtotime('-7 day')))->get();
            $jumlah_kunjungan = Medis::where('created_at', '>=', date('Y-m-d', strtotime('-7 day')))->count();

            $pdf = Pdf::loadView('admin.laporan.dokumen-kunjungan', compact('rekam_medis', 'jumlah_kunjungan'));
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream();
        }

        if($request->time == '30')
        {
            $rekam_medis = Medis::where('created_at', '>=', date('Y-m-d', strtotime('-30 day')))->get();
            $jumlah_kunjungan = Medis::where('created_at', '>=', date('Y-m-d', strtotime('-30 day')))->count();

            $pdf = Pdf::loadView('admin.laporan.dokumen-kunjungan', compact('rekam_medis', 'jumlah_kunjungan'));
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream();
        }

        if($request->time == '365')
        {
            $rekam_medis = Medis::where('created_at', '>=', date('Y-m-d', strtotime('-365 day')))->get();
            $jumlah_kunjungan = Medis::where('created_at', '>=', date('Y-m-d', strtotime('-365 day')))->count();

            $pdf = Pdf::loadView('admin.laporan.dokumen-kunjungan', compact('rekam_medis', 'jumlah_kunjungan'));
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream();
        }

        if($request->time == 'all')
        {
            $rekam_medis = Medis::all();
            $jumlah_kunjungan = Medis::all()->count();
            $pdf = Pdf::loadView('admin.laporan.dokumen-kunjungan', compact('rekam_medis', 'jumlah_kunjungan'));
            $pdf->setPaper('a4', 'landscape');
            return $pdf->stream();
        }
    }
}