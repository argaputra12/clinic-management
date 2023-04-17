<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';

    protected $fillable = [
        'kode_bayar',
        'pasien_id',
        'no_rm',
        'tindakan',
        'alat_medis',
        'administrasi',
        'total_bayar',
        'metode_pembayaran',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }
}