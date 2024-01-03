<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\LaporanHelper as LprHelper;
use Illuminate\Http\Request;

class LogbookLaporanGratifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('logbook.gratifikasi.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logbook.gratifikasi.form');
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
            'showGratifikasi' => LprHelper::showGratifikasi($id),
            'detailAnalisis' => LprHelper::detailAnalisisGratifikasi($id),
            'id' => $id,
            'detailLogbook' => LprHelper::detaillogbookGratifikasi($id),
        );
        return view('logbook.gratifikasi.form', $data);
    }

    public function monitorPelaporan()
    {
        return view('kepalaBalai.logbook.gratifikasi.view');
    }

    public function showMonitorPelaporan($id)
    {
        $data = array(
            'showLogbookGratifikasi' => LprHelper::showGratifikasi($id),
            'detailAnalisis' => LprHelper::detailAnalisisGratifikasi($id),
            'detailLogbook' => LprHelper::detaillogbookGratifikasi($id),
            'id' => $id,
        );
        return view('kepalaBalai.logbook.gratifikasi.show', $data);
    }
}
