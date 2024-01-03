<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisisLaporanPenyuapan extends Model
{
    use HasFactory;

    protected $table = 'analisis_laporan_penyuapans';
    protected $fillable = [
        'id_penyuapan',
        'hasil_investigasi',
        'kesimpulan',
    ];

    // Relationship
    public function laporanPenyuapan()
    {
        return $this->belongsTo('App\Models\LaporanPenyuapan', 'id_pengaduan', 'id');
    }
}
