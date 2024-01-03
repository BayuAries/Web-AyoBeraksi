<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\LaporanHelper as LprHelper;
use Illuminate\Http\Request;

class KlasifikasiLaporanPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('klasifikasiLaporanPengaduan.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasiLaporanPengaduan.form');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'showKlasifikasiPengaduan' => LprHelper::showPengaduan($id),
            'detailKlasifikasi' => LprHelper::detailKlasifikasiPengaduan($id),
            'id' => $id,
        );
        return view('klasifikasiLaporanPengaduan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'showKlasifikasiPengaduan' => LprHelper::showPengaduan($id),
            'detailKlasifikasi' => LprHelper::detailKlasifikasiPengaduan($id),
            'id' => $id,
        );
        return view('klasifikasiLaporanPengaduan.form', $data);
    }

    public function monitorPelaporan()
    {
        return view('kepalaBalai.klasifikasiPengaduan.view');
    }

    public function showMonitorPelaporan($id)
    {
        $data = array(
            'showKlasifikasiPengaduan' => LprHelper::showPengaduan($id),
            'detailKlasifikasi' => LprHelper::detailKlasifikasiPengaduan($id),
            'id' => $id,
        );
        return view('kepalaBalai.klasifikasiPengaduan.show', $data);
    }
}
