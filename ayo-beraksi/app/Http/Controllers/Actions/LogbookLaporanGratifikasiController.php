<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Resources\LogbookLaporanGratifikasiCollection;
use App\Models\LogbookLaporanGratifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LogbookLaporanGratifikasiController extends Controller
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
                'hasil_analisis' => 'required',
                'keterangan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            $logbook = new LogbookLaporanGratifikasi();
            $logbook->id_gratifikasi = $request->id_gratifikasi;
            $logbook->hasil_analisis = $request->hasil_analisis;
            $logbook->keterangan = $request->keterangan;
            $logbook->save();

            DB::commit();
            $message = 'Data logbook Berhasil disimpan';
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
        $logbook = LogbookLaporanGratifikasi::when('id_gratifikasi', $id)->first();
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
                'hasil_analisis' => 'required',
                'keterangan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            $logbook = LogbookLaporanGratifikasi::findOrFail($id);
            $logbook->id_gratifikasi = $request->id_gratifikasi;
            $logbook->hasil_analisis = $request->hasil_analisis;
            $logbook->keterangan = $request->keterangan;
            $logbook->save();

            DB::commit();
            $message = 'Data logbook Berhasil disimpan';
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
            $logbook = LogbookLaporanGratifikasi::findOrFail($id);
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
        $query = LogbookLaporanGratifikasi::orderBy('id', 'ASC')->get();
        $data = new LogbookLaporanGratifikasiCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Logbook Gratifikasi'
        ]);
    }

    public function getListLogbookTugas()
    {
        $laporan_id = Auth::user()->timPemeriksaGratifikasi->pluck('id_laporan_gratifikasi')->toArray();
        $query = LogbookLaporanGratifikasi::where('id_gratifikasi', $laporan_id);
        $data = new LogbookLaporanGratifikasiCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Laporan'
        ]);
    }
}
