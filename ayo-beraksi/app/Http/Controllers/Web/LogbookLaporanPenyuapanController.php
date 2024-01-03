<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\LaporanHelper as LprHelper;
use Illuminate\Http\Request;

class LogbookLaporanPenyuapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('logbook.penyuapan.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logbook.penyuapan.form');
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
            'showPenyuapan' => LprHelper::showPenyuapan($id),
            'id' => LprHelper::detailAnalisisPenyuapan($id),
            'detailAnalisis' => LprHelper::detailAnalisisPenyuapan($id),
            'detailLogbook' => LprHelper::detaillogbookPenyuapan($id),
        );
        return view('logbook.penyuapan.form', $data);
    }

    public function monitorPelaporan()
    {
        return view('kepalaBalai.logbook.penyuapan.view');
    }

    public function showMonitorPelaporan($id)
    {
        $data = array(
            'showLogbookPenyuapan' => LprHelper::showPenyuapan($id),
            'detailAnalisis' => LprHelper::detailAnalisisPenyuapan($id),
            'detailLogbook' => LprHelper::detaillogbookPenyuapan($id),
            'id' => $id,
        );
        return view('kepalaBalai.logbook.penyuapan.show', $data);
    }
}
