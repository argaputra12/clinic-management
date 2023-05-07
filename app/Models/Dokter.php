<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters';

    protected $fillable = [
        'nama_dokter',
        'jenis_kelamin',
        'alamat',
        'no_telp',
        'tanggal_lahir',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nik_dokter', 'nik');
    }
}