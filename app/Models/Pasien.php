<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $fillable = [
        'no_rm',
        'tanggal_kunjungan',
        'nama_pasien',
        'tanggal_lahir',
        'umur',
        'jenis_kelamin',
        'no_telp',
        'alamat',
        'keluhan'
    ];

}