<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimPemeriksaGratifikasi extends Model
{
    use HasFactory;

    protected $table = 'tim_pemeriksa_gratifikasis';
    protected $fillable = [
        'id_laporan_gratifikasi',
        'id_anggota',
        'nama',
        'jabatan',
    ];

    // Relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_anggota','id');
    }

    public function gratifikasi()
    {
        return $this->belongsTo('App\Models\LaporanGratifikasi','id_laporan_gratifikasi','id');
    }
}
