<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Resources\LaporanGratifikasiCollection;
use App\Http\Resources\LaporanPengaduanCollection;
use App\Http\Resources\LaporanPenyuapanCollection;
use App\Models\LaporanGratifikasi;
use App\Models\LaporanPengaduan;
use App\Models\LaporanPenyuapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getListLaporan()
    {
        $user_id = Auth::user()->id;
        $query1 = LaporanPengaduan::where('id_pelapor', $user_id)->get();
        $data1 = new LaporanPengaduanCollection($query1);

        $query2 = LaporanPenyuapan::where('id_pelapor', $user_id)->get();
        $data2 = new LaporanPenyuapanCollection($query2);

        $query3 = LaporanGratifikasi::where('id_pelapor', $user_id)->get();
        $data3 = new LaporanGratifikasiCollection($query3);

        $data = collect($data1)->merge($data2)
            ->merge($data3);
        $data = $data->sortBy('created_at');

        $total = $data->count();
        return response()->json([
            'total laporan' => $total,
            'message' => 'Data List Seluruh Laporan',
            'data' => $data
        ]);
    }
}
