<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Resources\LogbookLaporanPenyuapanCollection;
use App\Models\LogbookLaporanPenyuapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LogbookLaporanPenyuapanController extends Controller
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
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'uraian_kejadian' => 'required',
                'saksi' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            $logbook = new LogbookLaporanPenyuapan();
            $logbook->id_penyuapan = $request->id_penyuapan;
            $logbook->uraian_kejadian = $request->uraian_kejadian;
            $logbook->saksi = $request->saksi;
            $logbook->save();

            DB::commit();
            $message = 'Data analisisi Berhasil disimpan';
            return response()->json([
                'data' => $logbook,
                'message' => $message,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'succses' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logbook = LogbookLaporanPenyuapan::findOrFail($id);
        return response()->json([
            'data' => $logbook,
            'message' => 'Data Berhasil ditampilkan',
        ]);
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
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'uraian_kejadian' => 'required',
                'saksi' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            $logbook = LogbookLaporanPenyuapan::findOrFail($id);
            $logbook->id_penyuapan = $request->id_penyuapan;
            $logbook->uraian_kejadian = $request->uraian_kejadian;
            $logbook->saksi = $request->saksi;
            $logbook->save();

            DB::commit();
            $message = 'Data analisisi Berhasil disimpan';
            return response()->json([
                'data' => $logbook,
                'message' => $message,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'succses' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $logbook = LogbookLaporanPenyuapan::findOrFail($id);
            $logbook->delete();
            DB::commit();
            return response()->json([
                'data' => $logbook,
                'message' => 'Data Berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json([
                'succses' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function getList()
    {
        $query = LogbookLaporanPenyuapan::orderBy('id', 'ASC')->get();
        $data = new LogbookLaporanPenyuapanCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Logbook Penyuapan'
        ]);
    }

    public function getListLogbookTugas()
    {
        $laporan_id = Auth::user()->timPemeriksaPenyuapan->pluck('id_laporan_penyuapan')->toArray();
        $query = LogbookLaporanPenyuapan::where('id_penyuapan', $laporan_id);
        $data = new LogbookLaporanPenyuapanCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Laporan'
        ]);
    }
}
