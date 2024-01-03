<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Actions\PushNotificationController;
use App\Http\Resources\KlasifikasiLaporanPengaduanCollection;
use App\Http\Resources\KlasifikasiLaporanPengaduanResource;
use App\Http\Resources\LaporanPengaduanCollection;
use App\Models\KlasifikasiLaporanPengaduan;
use App\Models\LaporanPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KlasifikasiLaporanPengaduanController extends Controller
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
                'klasifikasi' => 'required',
                // 'kategori' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            $analsis = new KlasifikasiLaporanPengaduan();
            $analsis->id_pengaduan = $request->id_pengaduan;
            $analsis->klasifikasi = $request->klasifikasi;
            $analsis->kategori = $request->kategori;
            if ($analsis->klasifikasi == 'A') {
                $analsis->keterangan = 'diselesaikan BBKP Belawan';
            }
            if ($analsis->klasifikasi == 'B') {
                if ($analsis->kategori == '1' || $analsis->kategori == '2' || $analsis->kategori == '3') {
                    $analsis->keterangan = 'diselesaikan BBKP Belawan';
                } else if ($analsis->kategori == '4' || $analsis->kategori == '5') {
                    $analsis->keterangan = 'disampaikan kepada Inspektorat Investigasi';
                } elseif ($analsis->kategori == '6') {
                    $analsis->keterangan = 'disampaikan kepada Sekertariat Badan Karantina Pertanian';
                }
            }

            $analsis->save();

            $request->id_pengguna = $request->id_pengguna;
            $request->title = "Laporan Pengaduan";
            $request->body = "Laporan Pengaduan anda telah di klasifikasi";
            $notif = $this->PushNotificationController->sendPushNotification($request);

            DB::commit();
            $message = 'Data klasifikasi Berhasil disimpan';
            return response()->json([
                'data' => $analsis,
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
        $analsis = KlasifikasiLaporanPengaduan::findOrFail($id);
        return response()->json([
            'data' => $analsis,
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
                'klasifikasi' => 'required',
                // 'kategori' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            $analsis = KlasifikasiLaporanPengaduan::findOrFail($id);
            $analsis->id_pengaduan = $request->id_pengaduan;
            $analsis->klasifikasi = $request->klasifikasi;
            $analsis->kategori = $request->kategori;
            if ($analsis->klasifikasi == 'A') {
                $analsis->keterangan = 'diselesaikan BBKP Belawan';
            }
            if ($analsis->klasifikasi == 'B') {
                if ($analsis->kategori == '1' || $analsis->kategori == '2' || $analsis->kategori == '3') {
                    $analsis->keterangan = 'diselesaikan BBKP Belawan';
                } else if ($analsis->kategori == '4' || $analsis->kategori == '5') {
                    $analsis->keterangan = 'disampaikan kepada Inspektorat Investigasi';
                } elseif ($analsis->kategori == '6') {
                    $analsis->keterangan = 'disampaikan kepada Sekertariat Badan Karantina Pertanian';
                }
            }

            $analsis->save();

            $request->id_pengguna = $request->id_pengguna;
            $request->title = "Laporan Pengaduan";
            $request->body = "Laporan Pengaduan anda telah di klasifikasi";
            $notif = $this->PushNotificationController->sendPushNotification($request);

            $data = new KlasifikasiLaporanPengaduanResource($analsis);
            DB::commit();
            $message = 'Data klasifikasi Berhasil diupdate';
            return response()->json([
                'data' => $data,
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
            $analsis = KlasifikasiLaporanPengaduan::findOrFail($id);
            $analsis->delete();
            DB::commit();
            return response()->json([
                'data' => $analsis,
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
        $query = KlasifikasiLaporanPengaduan::orderBy('id', 'DESC')->get();
        $data = new KlasifikasiLaporanPengaduanCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Laporan'
        ]);
    }

    // public function getListKasifikasi()
    // {
    //     $laporan_id = Auth::user()->timPemeriksaPengaduan->pluck('id_laporan_pengaduan')->toArray();
    //     // $laporan_id = Auth::user()->timPemeriksaPengaduan->pengaduan->pluck('id')->toArray();
    //     $query = LaporanPengaduan::findOrFail($laporan_id);
    //     // $data = new KlasifikasiLaporanPengaduanCollection($query);
    //     // $total = $query->count();
    //     return response()->json([
    //         'data' => $query,
    //         // 'total' => $total,
    //         'message' => 'Data List Laporan'
    //     ]);
    // }
}
