<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Actions\PushNotificationController;
use App\Http\Resources\LaporanGratifikasiCollection;
use App\Http\Resources\LaporanGratifikasiResource;
use App\Models\LaporanGratifikasi;
use App\Models\TimPemeriksaGratifikasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LaporanGratifikasiController extends Controller
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
                'nama_terlapor' => 'required',
                'tanggal_kejadian' => 'required',
                'kronologis_kejadian' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            // save data
            $laporan = new LaporanGratifikasi();
            $laporan->no_laporan = $request->no_laporan;
            $laporan->pengirim = $request->pengirim;
            $laporan->id_pelapor = Auth::user()->id;
            $laporan->nama_pelapor = Auth::user()->name;
            $laporan->nama_terlapor = $request->nama_terlapor;
            $laporan->jabatan = $request->jabatan;
            $laporan->instansi = $request->instansi;
            $laporan->tanggal_kejadian = $request->tanggal_kejadian;
            $laporan->tanggal_pelaporan = Carbon::now()->format('Y-m-d');
            $laporan->kronologis_kejadian = $request->kronologis_kejadian;
            $laporan->status = $request->status;
            $laporan->deskripsi_status = $request->deskripsi_status;
            $laporan->tindaklanjut = $request->tindaklanjut;
            $laporan->save();

            $request->id_pengguna = Auth::user()->id;
            $request->title = "Laporan Gratifikasi";
            $request->body = "Terimaksih telah melaporkan Gratifikasi ke Ayo BerAksi";

            $notif = $this->PushNotificationController->sendPushNotification($request);
            // $notification = PushNotificationController::sendPushNotification($request);
            DB::commit();
            $message = 'Data Berhasil disimpan';
            return response()->json([
                'data' => $laporan,
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
        $laporan = LaporanGratifikasi::findOrFail($id);
        return response()->json([
            'data' => $laporan,
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
                'nama_terlapor' => 'required',
                'tanggal_kejadian' => 'required',
                'kronologis_kejadian' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            // save data
            $laporan = LaporanGratifikasi::findOrFail($id);
            $laporan->no_laporan = $request->no_laporan;
            $laporan->pengirim = $request->pengirim;
            $laporan->id_pelapor = Auth::user()->id;
            $laporan->nama_pelapor = Auth::user()->name;
            $laporan->nama_terlapor = $request->nama_terlapor;
            $laporan->jabatan = $request->jabatan;
            $laporan->instansi = $request->instansi;
            $laporan->tanggal_kejadian = $request->tanggal_kejadian;
            $laporan->tanggal_pelaporan = $request->tanggal_pelaporan;
            $laporan->kronologis_kejadian = $request->kronologis_kejadian;
            $laporan->status = $request->status;
            $laporan->deskripsi_status = $request->deskripsi_status;
            $laporan->tindaklanjut = $request->tindaklanjut;
            $laporan->save();

            $request->id_pengguna = Auth::user()->id;
            $request->title = "Laporan Gratifikasi";
            $request->body = "Laporkan Gratifikasi anda berhasil diupdate";

            $notif = $this->PushNotificationController->sendPushNotification($request);
            // $notification = PushNotificationController::sendPushNotification($request);

            $data = new LaporanGratifikasiResource($laporan);
            DB::commit();
            $message = 'Data Berhasil diupdate';
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
            $laporan = LaporanGratifikasi::findOrFail($id);
            $request = new Request();
            $request->id_pengguna = $laporan->id_pelapor;
            $request->title = "Laporan Gratifikasi";
            $request->body = "Data Berhasil dihapus";

            $laporan->delete();
            $notif = $this->PushNotificationController->sendPushNotification($request);
            // $notification = PushNotificationController::sendPushNotification($request);
            DB::commit();
            return response()->json([
                'data' => $laporan,
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
        $query = LaporanGratifikasi::orderBy('created_at', 'DESC')->get();
        $data = new LaporanGratifikasiCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Get data List',
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'status' => 'required',
                'deskripsi_status' => 'required',
                'tindaklanjut' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            // save data
            $laporan = LaporanGratifikasi::findOrFail($id);
            $laporan->status = $request->status;
            $laporan->deskripsi_status = $request->deskripsi_status;
            $laporan->tindaklanjut = $request->tindaklanjut;
            $status = $laporan->status;
            $laporan->save();

            $detail = TimPemeriksaGratifikasi::where('id_laporan_gratifikasi', $id)->delete();

            if ($status == 1) {
                $ketua = new TimPemeriksaGratifikasi();
                $ketua->id_laporan_gratifikasi = $id;
                $ketua->id_anggota = $request->ketua;
                $ketua->nama = User::findOrFail($request->ketua)->name;
                $ketua->jabatan = "Ketua tim";
                $ketua->save();

                $anggota2 = new TimPemeriksaGratifikasi();
                $anggota2->id_laporan_gratifikasi = $id;
                $anggota2->id_anggota = $request->anggota1;
                $anggota2->nama = User::findOrFail($request->anggota1)->name;
                $anggota2->jabatan = "Anggota 1";
                $anggota2->save();

                $anggota3 = new TimPemeriksaGratifikasi();
                $anggota3->id_laporan_gratifikasi = $id;
                $anggota3->id_anggota = $request->anggota2;
                $anggota3->nama = User::findOrFail($request->anggota2)->name;
                $anggota3->jabatan = "Anggota 2";
                $anggota3->save();

                $request->id_pengguna = $laporan->id_pelapor;
                $request->title = "Laporan Gratifikasi";
                $request->body = "Laporan Anda telah di Terima";

                // $laporan->deskripsi_status = null;
            }
            if ($status == 0) {
                $request->id_pengguna = $laporan->id_pelapor;
                $request->title = "Laporan Gratifikasi";
                $request->body = "Laporan Anda telah di Tolak";
            }

            $notif = $this->PushNotificationController->sendPushNotification($request);
            // $notification = PushNotificationController::sendPushNotification($request);
            $data = new LaporanGratifikasiResource($laporan);
            DB::commit();
            $message = 'Data Berhasil diupdate';
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

    public function getListPenugasan()
    {
        $laporan_id = Auth::user()->timPemeriksaGratifikasi->pluck('id_laporan_gratifikasi')->toArray();
        $query = LaporanGratifikasi::findOrFail($laporan_id);
        $data = new LaporanGratifikasiCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Laporan'
        ]);
    }
}
