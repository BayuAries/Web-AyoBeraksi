<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimPemeriksaPenyuapan extends Model
{
    use HasFactory;

    protected $table = 'tim_pemeriksa_penyuapans';
    protected $fillable = [
        'id_laporan_penyuapan',
        'id_anggota',
        'nama',
        'jabatan',
    ];

    // Relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_anggota','id');
    }

    public function penyuapan()
    {
        return $this->belongsTo('App\Models\LaporanPenyuapan','id_laporan_penyuapan','id');
    }
}
