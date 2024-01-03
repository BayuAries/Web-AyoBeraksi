<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\LaporanHelper as LprHelper;
use Illuminate\Http\Request;

class LaporanPenyuapanController extends Controller
{
    public function index()
    {
        return view('penyuapan.view');
    }

    public function create()
    {
        return view('penyuapan.form');
    }

    public function show($id)
    {
        $data = array(
            'showPenyuapan' => LprHelper::showPenyuapan($id),
            'id' => $id,
        );
        return view('penyuapan.show', $data);
    }

    public function edit($id)
    {
        $data = array(
            'showPenyuapan' => LprHelper::showPenyuapan($id),
            'tim_kepatuhan' => LprHelper::timKepatuhan(),
            'detailTim' => LprHelper::detailTimPenyuapan($id),
            'id' => $id,
        );
        return view('penyuapan.form', $data);
    }
}
