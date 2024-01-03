<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengaduan extends Model
{
    use HasFactory;

    protected $table = 'laporan_pengaduans';
    protected $fillable = [
        'nama_ketua',               // nama yang dilaporkan
        'id_pelapor',               // id pelapor
        'nama_pelapor',
        'alamat',
        'nik',
        'uraian_laporan',
        'saran_masukan',
        'tanggal_pengaduan',
        'status',                   // status laporan
        'deskripsi_status',
    ];

    // Relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_pelapor', 'id');
    }

    public function timPemeriksa()
    {
        return $this->hasMany('App\Models\TimPemeriksaPengaduan');
    }

    public function klasifikasiPengaduan()
    {
        return $this->hasMany('App\Models\KlasifikasiLaporanPengaduan');
    }
}
