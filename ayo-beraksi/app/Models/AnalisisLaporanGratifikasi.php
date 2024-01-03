<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisisLaporanGratifikasi extends Model
{
    use HasFactory;

    protected $table = 'analisis_laporan_gratifikasis';
    protected $fillable = [
        'id_gratifikasi',
        'jenis_gratifikasi',
        'nilai_gratifikasi',
        'frekuensi_pelapor',
        'tujuan',
        'status_batas',
        'status_frekuensi',
        'rekomendasi_tindak_lanjut',
    ];

    // Relationship
    public function laporanGratifikasi()
    {
        return $this->belongsTo('App\Models\LaporanGratifikasi', 'id_gratifikasi', 'id');
    }
}
