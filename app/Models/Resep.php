<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'reseps';

    protected $fillable = [
        'kode_resep',
        'medis_id',
        'total_harga',
    ];

    public function medis()
    {
        return $this->belongsTo(Medis::class, 'medis_id', 'id');
    }
}