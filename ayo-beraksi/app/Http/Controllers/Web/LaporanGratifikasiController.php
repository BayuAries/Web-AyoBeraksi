<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\LaporanHelper as LprHelper;
use Illuminate\Http\Request;

class LaporanGratifikasiController extends Controller
{
    public function index()
    {
        return view('gratifikasi.view');
    }

    public function create()
    {
        return view('gratifikasi.form');
    }

    public function show($id)
    {
        $data = array(
            'showGratifikasi' => LprHelper::showGratifikasi($id),
            'id' => $id,
        );
        return view('gratifikasi.show', $data);
    }

    public function edit($id)
    {
        $data = array(
            'showGratifikasi' => LprHelper::showGratifikasi($id),
            'tim_kepatuhan' => LprHelper::timKepatuhan(),
            'detailTim' => LprHelper::detailTimGratifikasi($id),
            'id' => $id,
        );
        return view('gratifikasi.form', $data);
    }
}
