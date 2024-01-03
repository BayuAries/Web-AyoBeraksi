<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\LaporanHelper as LprHelper;
use Illuminate\Http\Request;

class AnalisisLaporanPenyuapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('analisisLaporan.penyuapan.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('analisisLaporan.penyuapan.form');
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
            'showAnalisisPenyuapan' => LprHelper::showPenyuapan($id),
            'id' => $id,
        );
        return view('analisisLaporan.penyuapan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $analisis = LprHelper::detailAnalisisPenyuapan($id);
        $data = array(
            'showAnalisisPenyuapan' => LprHelper::showPenyuapan($id),
            'id' => LprHelper::detailAnalisisPenyuapan($id),
            'detailAnalisis' => LprHelper::detailAnalisisPenyuapan($id),
        );
        return view('analisisLaporan.penyuapan.form', $data);
    }

    public function monitorPelaporan()
    {
        return view('kepalaBalai.analisis.penyuapan.view');
    }

    public function showMonitorPelaporan($id)
    {
        $data = array(
            'showLaporanPenyuapan' => LprHelper::showPenyuapan($id),
            'showAnalisis' => LprHelper::detailAnalisisPenyuapan($id),
            'id' => $id,
        );
        return view('kepalaBalai.analisis.penyuapan.show', $data);
    }
}
