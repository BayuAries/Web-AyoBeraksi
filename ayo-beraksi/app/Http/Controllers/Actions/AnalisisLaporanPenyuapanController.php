<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Actions\PushNotificationController;
use App\Http\Resources\AnalisisLaporanPenyuapanCollection;
use App\Models\AnalisisLaporanPenyuapan;
use App\Models\LogbookLaporanPenyuapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AnalisisLaporanPenyuapanController extends Controller
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
                'hasil_investigasi' => 'required',
                'kesimpulan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            $analisis = new AnalisisLaporanPenyuapan();
            $analisis->id_penyuapan = $request->id_penyuapan;
            $analisis->hasil_investigasi = $request->hasil_investigasi;
            $analisis->kesimpulan = $request->kesimpulan;
            $analisis->save();

            $logbook = new LogbookLaporanPenyuapan();
            $logbook->id_penyuapan = $request->id_penyuapan;
            $logbook->save();

            $request->id_pengguna = $request->id_pengguna;
            $request->title = "Laporan Penyuapan";
            $request->body = "Laporan Penyuapan Anda sudah di analisis";
            $notif = $this->PushNotificationController->sendPushNotification($request);

            DB::commit();
            $message = 'Data analisis Berhasil disimpan';
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
        $analisis = AnalisisLaporanPenyuapan::findOrFail($id);
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
                'hasil_investigasi' => 'required',
                'kesimpulan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            $analisis = AnalisisLaporanPenyuapan::findOrFail($id);
            // $analisis->id_penyuapan = $request->id_penyuapan;
            $analisis->hasil_investigasi = $request->hasil_investigasi;
            $analisis->kesimpulan = $request->kesimpulan;
            $analisis->save();

            $request->id_pengguna = $request->id_pengguna;
            $request->title = "Laporan Penyuapan";
            $request->body = "Laporan Penyuapan Anda sudah di analisis";
            $notif = $this->PushNotificationController->sendPushNotification($request);

            DB::commit();
            $message = 'Data analisis Berhasil disimpan';
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
            $analisis = AnalisisLaporanPenyuapan::findOrFail($id);
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
        $query = AnalisisLaporanPenyuapan::orderBy('id', 'DESC')->get();
        $data = new AnalisisLaporanPenyuapanCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Laporan'
        ]);
    }
}
