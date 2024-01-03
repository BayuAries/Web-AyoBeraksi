<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Actions\PushNotificationController;
use App\Http\Resources\AnalisisLaporanGratifikasiCollection;
use App\Models\AnalisisLaporanGratifikasi;
use App\Models\LogbookLaporanGratifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AnalisisLaporanGratifikasiController extends Controller
{
    protected $PushNotificationController;
    public function __construct(PushNotificationController $PushNotificationController)
    {
        $this->PushNotificationController = $PushNotificationController;
    }
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
                'jenis_gratifikasi' => 'required',
                'nilai_gratifikasi' => 'required',
                'frekuensi_pelapor' => 'required',
                'tujuan' => 'required',
                'status_batas' => 'required',
                'status_frekuensi' => 'required',
                'rekomendasi_tindak_lanjut' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            $analisis = new AnalisisLaporanGratifikasi();
            $analisis->id_gratifikasi = $request->id_gratifikasi;
            $analisis->jenis_gratifikasi = $request->jenis_gratifikasi;
            $analisis->nilai_gratifikasi = $request->nilai_gratifikasi;
            $analisis->frekuensi_pelapor = $request->frekuensi_pelapor;
            $analisis->tujuan = $request->tujuan;
            $analisis->status_batas = $request->status_batas;
            $analisis->status_frekuensi = $request->status_frekuensi;
            $analisis->rekomendasi_tindak_lanjut = $request->rekomendasi_tindak_lanjut;
            $analisis->save();

            $logbook = new LogbookLaporanGratifikasi();
            $logbook->id_gratifikasi = $request->id_gratifikasi;
            $logbook->id_analisis_gratifikasi = $analisis->id;
            $logbook->save();

            $request->id_pengguna = $request->id_pengguna;
            $request->title = "Laporan Gratifikasi";
            $request->body = "Laporan Gratifikasi Anda sudah di Analisi";
            $notif = $this->PushNotificationController->sendPushNotification($request);

            DB::commit();
            $message = 'Data analisisi Berhasil disimpan';
            return response()->json([
                'data' => $analisis,
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
        $analisis = AnalisisLaporanGratifikasi::findOrFail($id);
        return response()->json([
            'data' => $analisis,
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
                'jenis_gratifikasi' => 'required',
                'nilai_gratifikasi' => 'required',
                'frekuensi_pelapor' => 'required',
                'tujuan' => 'required',
                'status_batas' => 'required',
                'status_frekuensi' => 'required',
                'rekomendasi_tindak_lanjut' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            $analisis = AnalisisLaporanGratifikasi::findOrFail($id);
            // $analisis->id_gratifikasi = $request->id_gratifikasi;
            $analisis->jenis_gratifikasi = $request->jenis_gratifikasi;
            $analisis->nilai_gratifikasi = $request->nilai_gratifikasi;
            $analisis->frekuensi_pelapor = $request->frekuensi_pelapor;
            $analisis->tujuan = $request->tujuan;
            $analisis->status_batas = $request->status_batas;
            $analisis->status_frekuensi = $request->status_frekuensi;
            $analisis->rekomendasi_tindak_lanjut = $request->rekomendasi_tindak_lanjut;
            $analisis->save();

            $request->id_pengguna = $request->id_pengguna;
            $request->title = "Laporan Gratifikasi";
            $request->body = "Laporan Gratifikasi Anda sudah di Analisi";
            $notif = $this->PushNotificationController->sendPushNotification($request);

            DB::commit();
            $message = 'Data analisisi Berhasil disimpan';
            return response()->json([
                'data' => $analisis,
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
            $analisis = AnalisisLaporanGratifikasi::findOrFail($id);
            $analisis->delete();
            DB::commit();
            return response()->json([
                'data' => $analisis,
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
        $query = AnalisisLaporanGratifikasi::orderBy('id', 'DESC')->get();
        $data = new AnalisisLaporanGratifikasiCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Laporan'
        ]);
    }
}
