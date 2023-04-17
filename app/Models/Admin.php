<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'nik_admin',
        'nama_admin',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nik_admin', 'nik');
    }
}