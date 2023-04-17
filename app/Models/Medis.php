<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medis extends Model
{
    use HasFactory;

    protected $table = 'medis';

    protected $fillable = [
        'pasien_id',
        'no_rm',
        'tanggal_kunjungan',
        'nama_pasien',
        'tanggal_lahir',
        'alamat',
        'tensi',
        'keluhan',
        'diagnosa',
        'tindakan',
        'nama_dokter',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }
}