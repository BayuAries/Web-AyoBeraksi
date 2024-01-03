<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogbookLaporanGratifikasi extends Model
{
    use HasFactory;

    protected $table = 'logbook_laporan_gratifikasis';
    protected $fillable = [
        'id_gratifikasi',
        'hasil_analisis',
        'keterangan',
    ];

    // Relationship
    public function laporanGratifikasi()
    {
        return $this->belongsTo('App\Models\LaporanGratifikasi', 'id_gratifikasi', 'id');
    }
}
