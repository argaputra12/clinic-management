<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    use HasFactory;

    protected $table = 'resep_obats';

    protected $fillable = [
        'resep_id',
        'obat_id',
        'jumlah',
    ];

    public function resep()
    {
        return $this->belongsToMany(Resep::class);
    }

    public function obat()
    {
        return $this->belongsToMany(Obat::class);
    }
}