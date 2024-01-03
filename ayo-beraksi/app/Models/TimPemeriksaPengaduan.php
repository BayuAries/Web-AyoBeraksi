<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimPemeriksaPengaduan extends Model
{
    use HasFactory;

    protected $table = 'tim_pemeriksa_pengaduans';
    protected $fillable = [
        'id_laporan_pengaduan',
        'id_anggota',
        'nama',
        'jabatan',
    ];

    // Relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_anggota', 'id');
    }

    public function laporanPengaduan()
    {
        return $this->belongsTo('App\Models\LaporanPengaduan', 'id_laporan_pengaduan', 'id');
    }
}
