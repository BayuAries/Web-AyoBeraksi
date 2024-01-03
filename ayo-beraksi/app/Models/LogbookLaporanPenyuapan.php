<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogbookLaporanPenyuapan extends Model
{
    use HasFactory;

    protected $table = 'logbook_laporan_penyuapans';
    protected $fillable = [
        'id_penyuapan',
        'uraian_kejadian',
        'saksi',
    ];

    // Relationship
    public function laporanPenyuapan()
    {
        return $this->belongsTo('App\Models\LaporanPenyuapan', 'id_penyuapan', 'id');
    }
}
