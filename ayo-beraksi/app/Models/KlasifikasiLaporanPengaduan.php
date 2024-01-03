<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiLaporanPengaduan extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi_laporan_pengaduans';
    protected $fillable = [
        'id_pengaduan',
        'klasifikasi',
        'kategori',
        'keterangan',
    ];

    // Relationship
    public function laporanPengaduan()
    {
        return $this->belongsTo('App\Models\LaporanPengaduan', 'id_pengaduan', 'id');
    }
}
