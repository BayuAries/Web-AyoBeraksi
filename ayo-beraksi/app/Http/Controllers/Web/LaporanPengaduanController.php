<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\LaporanHelper as LprHelper;
use Illuminate\Http\Request;

class LaporanPengaduanController extends Controller
{
    public function index()
    {
        return view('pengaduan.view');
    }

    public function create()
    {
        return view('pengaduan.form');
    }

    public function show($id)
    {
        $data = array(
            'showPengaduan' => LprHelper::showPengaduan($id),
            'id' => $id,
        );
        return view('pengaduan.show', $data);
    }

    public function edit($id)
    {
        $data = array(
            'showPengaduan' => LprHelper::showPengaduan($id),
            'tim_kepatuhan' => LprHelper::timKepatuhan(),
            'detailTim' => LprHelper::detailTimPengaduan($id),
            'id' => $id,
        );
        return view('pengaduan.form', $data);
    }

    public function penugasan()
    {
        return view('pengaduan.table');
    }
}
