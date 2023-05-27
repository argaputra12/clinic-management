<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';

    protected $fillable = [
        'pasien_id',
        'rekam_medis_id',
        'alat_medis',
        'administrasi',
        'total_bayar',
        'metode_pembayaran',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    public function medis()
    {
        return $this->belongsTo(Medis::class, 'rekam_medis_id', 'id');
    }
}