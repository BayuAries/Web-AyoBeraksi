<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\LaporanHelper as LprHelper;
use Illuminate\Http\Request;

class AnalisisLaporanGratifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('analisisLaporan.gratifikasi.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('analisisLaporan.gratifikasi.form');
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
            'showAnalisisGratifikasi' => LprHelper::showGratifikasi($id),
            'id' => $id,
        );
        return view('analisisLaporan.gratifikasi.show', $data);
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
            'showAnalisisGratifikasi' => LprHelper::showGratifikasi($id),
            'detailAnalisis' => LprHelper::detailAnalisisGratifikasi($id),
            'id' => $id,
        );
        return view('analisisLaporan.gratifikasi.form', $data);
    }

    public function monitorPelaporan()
    {
        return view('kepalaBalai.analisis.gratifikasi.view');
    }

    public function showMonitorPelaporan($id)
    {
        $data = array(
            'laporanGratifikasi' => LprHelper::showGratifikasi($id),
            'showAnalisis' => LprHelper::detailAnalisisGratifikasi($id),
            'id' => $id,
        );
        return view('kepalaBalai.analisis.gratifikasi.show', $data);
    }
}
