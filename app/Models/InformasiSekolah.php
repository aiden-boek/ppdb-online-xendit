<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiSekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_ajar',
        'tanggal_laporan',
        'nama_kepsek',
        'nip',
    ];
}