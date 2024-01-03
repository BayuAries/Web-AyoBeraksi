<?php

namespace App\Helpers;

use App\Models\AnalisisLaporanGratifikasi;
use App\Models\AnalisisLaporanPenyuapan;
use App\Models\Feedback;
use App\Models\KlasifikasiLaporanPengaduan;
use App\Models\LaporanGratifikasi;
use App\Models\LaporanPengaduan;
use App\Models\LaporanPenyuapan;
use App\Models\LogbookLaporanGratifikasi;
use App\Models\LogbookLaporanPenyuapan;
use App\Models\TimPemeriksaGratifikasi;
use App\Models\TimPemeriksaPengaduan;
use App\Models\TimPemeriksaPenyuapan;
use App\Models\User;

class LaporanHelper
{
    // =========== Laporan Penyuapan ===========
    // Get a Laporan Penyuapan based on id
    public static function penyuapan()
    {
        return LaporanPenyuapan::orderBy('id')->get();
    }
    public static function showPenyuapan($id)
    {
        return LaporanPenyuapan::findOrFail($id);
    }

    // =========== Laporan Pengaduan ===========
    // Get a Laporan Pengaduan based on id
    public static function pengaduan()
    {
        return LaporanPengaduan::orderBy('id')->get();
    }
    public static function showPengaduan($id)
    {
        return LaporanPengaduan::findOrFail($id);
    }

    // =========== Laporan Gratifikasi ===========
    // Get a Laporan Gratifikasi based on id
    public static function gratifikasi()
    {
        return LaporanGratifikasi::orderBy('id')->get();
    }
    public static function showGratifikasi($id)
    {
        return LaporanGratifikasi::findOrFail($id);
    }

    // =========== Feedback ===========
    // Get a Feedback based on id
    public static function feedback()
    {
        return Feedback::orderBy('id')->get();
    }
    public static function showFeedback($id)
    {
        return Feedback::findOrFail($id);
    }


    // =========== Tim Kepatuhan ===========
    // Get a Tim Kepatuhan based on id
    public static function timKepatuhan()
    {
        return User::orderBy('id')->where('role_id', '3')->get();
    }

    public static function detailTimGratifikasi($id)
    {
        return TimPemeriksaGratifikasi::where('id_laporan_gratifikasi', $id)->orderBy('id', 'ASC')->get();
    }

    public static function detailTimPengaduan($id)
    {
        return TimPemeriksaPengaduan::where('id_laporan_pengaduan', $id)->orderBy('id', 'ASC')->get();
    }

    public static function detailTimPenyuapan($id)
    {
        return TimPemeriksaPenyuapan::where('id_laporan_penyuapan', $id)->orderBy('id', 'ASC')->get();
    }

    // =========== Analisis ===========
    // Get a Analisis based on id
    public static function detailAnalisisPenyuapan($id)
    {
        return AnalisisLaporanPenyuapan::where('id_penyuapan', $id)->first();
    }

    public static function detailAnalisisGratifikasi($id)
    {
        return AnalisisLaporanGratifikasi::where('id_gratifikasi', $id)->first();
    }

    public static function detailKlasifikasiPengaduan($id)
    {
        return KlasifikasiLaporanPengaduan::where('id_pengaduan', $id)->first();
    }

    // =========== LogBook ===========
    // Get a LogBook based on id
    public static function detaillogbookGratifikasi($id)
    {
        return LogbookLaporanGratifikasi::where('id_gratifikasi', $id)->first();
    }

    public static function detaillogbookPenyuapan($id)
    {
        return LogbookLaporanPenyuapan::where('id_penyuapan', $id)->first();
    }
}
