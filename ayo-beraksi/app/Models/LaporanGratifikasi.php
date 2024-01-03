<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanGratifikasi extends Model
{
    use HasFactory;

    protected $table = 'laporan_gratifikasis';
    protected $fillable = [
        'no_laporan',
        'pengirim',
        'id_pelapor',               // id pelapor
        'nama_pelapor',
        'nama_terlapor',            // nama yang dilaporkan
        'jabatan',
        'instansi',
        'tanggal_kejadian',
        'tanggal_pelaporan',
        'kronologis_kejadian',
        'status',                   // status laporan
        'deskripsi_status',         // alasan diambil
        'tindaklanjut',
    ];

    // Relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_pelapor', 'id');
    }

    public function timPemeriksa()
    {
        return $this->hasMany('App\Models\TimPemeriksaGratifikasi');
    }

    public function logbookGratifikasi()
    {
        return $this->hasMany('App\Models\LogbookLaporanGratifikasi');
    }
}
