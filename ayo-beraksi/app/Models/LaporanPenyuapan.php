<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenyuapan extends Model
{
    use HasFactory;

    protected $table = 'laporan_penyuapans';
    protected $fillable = [
        'nama_terlapor',            // nama yang dilaporkan
        'jabatan',                  // jabatan yang dilaporkan
        'instansi',                 // instansi
        'id_pelapor',               // id pelapor
        'nama_pelapor',
        'jabatan_pelapor',
        'instansi_pelapor',
        'kasus_suap',               // nama suap
        'nilai_suap',
        'lokasi',
        'tanggal_kejadian',
        'tanggal_pelaporan',
        'kronologis_kejadian',
        'status',                   // status laporan
        'deskripsi_status',         // deskripsi/alasan di tolak apa di terima
    ];

    // Relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_pelapor', 'id');
    }
    public function timPemeriksa()
    {
        return $this->hasMany('App\Models\TimPemeriksaPenyuapan');
    }

    public function logbookPenyuapan()
    {
        return $this->hasMany('App\Models\LogbookLaporanPenyuapan');
    }
}
