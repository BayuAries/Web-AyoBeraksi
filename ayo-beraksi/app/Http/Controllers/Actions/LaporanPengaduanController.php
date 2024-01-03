<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Actions\PushNotificationController;
use App\Http\Resources\LaporanPengaduanCollection;
use App\Http\Resources\LaporanPengaduanResource;
use App\Models\LaporanPengaduan;
use App\Models\TimPemeriksaPengaduan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LaporanPengaduanController extends Controller
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
                'alamat' => 'required',
                'nik' => 'required',
                'uraian_laporan' => 'required',
                'saran_masukan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            // save data
            $laporan = new LaporanPengaduan();
            $laporan->nama_ketua = $request->nama_ketua;
            $laporan->id_pelapor = Auth::user()->id;
            $laporan->nama_pelapor = Auth::user()->name;
            $laporan->alamat = $request->alamat;
            $laporan->nik = $request->nik;
            $laporan->uraian_laporan = $request->uraian_laporan;
            $laporan->saran_masukan = $request->saran_masukan;
            $laporan->tanggal_pengaduan = Carbon::now()->format('Y-m-d');
            $laporan->status = $request->status;
            $laporan->deskripsi_status = $request->deskripsi_status;
            $laporan->save();

            $request->id_pengguna = Auth::user()->id;
            $request->title = "Laporan Pengaduan";
            $request->body = "Terimakasih telah mengirimkan laporan pengaduan ke Ayo BerAksi";

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
        $laporan = LaporanPengaduan::findOrFail($id);
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
                'alamat' => 'required',
                'nik' => 'required',
                'uraian_laporan' => 'required',
                'saran_masukan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            // save data
            $laporan = LaporanPengaduan::findOrFail($id);
            $laporan->nama_ketua = $request->nama_ketua;
            $laporan->id_pelapor = Auth::user()->id;
            $laporan->nama_pelapor = Auth::user()->name;
            $laporan->alamat = $request->alamat;
            $laporan->nik = $request->nik;
            $laporan->uraian_laporan = $request->uraian_laporan;
            $laporan->saran_masukan = $request->saran_masukan;
            $laporan->tanggal_pengaduan = $request->tanggal_pengaduan;
            $laporan->save();

            $request->id_pengguna = Auth::user()->id;
            $request->title = "Laporan Gratifikasi";
            $request->body = "Laporkan Gratifikasi anda berhasil diupdate";

            $notif = $this->PushNotificationController->sendPushNotification($request);
            // $notification = PushNotificationController::sendPushNotification($request);

            $data = new LaporanPengaduanResource($laporan);
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
            $laporan = LaporanPengaduan::findOrFail($id);
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
        $query = LaporanPengaduan::orderBy('tanggal_pengaduan', 'DESC')->get();
        $data = new LaporanPengaduanCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Laporan'
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            // save data
            $laporan = LaporanPengaduan::findOrFail($id);
            $laporan->status = $request->status;
            $laporan->deskripsi_status = $request->deskripsi_status;
            $status = $laporan->status;
            $laporan->save();

            $detail = TimPemeriksaPengaduan::where('id_laporan_pengaduan', $id)->delete();

            if ($status == 1) {
                $ketua = new TimPemeriksaPengaduan();
                $ketua->id_laporan_pengaduan = $id;
                $ketua->id_anggota = $request->ketua;
                $ketua->nama = User::findOrFail($request->ketua)->name;
                $ketua->jabatan = "Ketua tim";
                $ketua->save();

                $anggota2 = new TimPemeriksaPengaduan();
                $anggota2->id_laporan_pengaduan = $id;
                $anggota2->id_anggota = $request->anggota1;
                $anggota2->nama = User::findOrFail($request->anggota1)->name;
                $anggota2->jabatan = "Anggota 1";
                $anggota2->save();

                $anggota3 = new TimPemeriksaPengaduan();
                $anggota3->id_laporan_pengaduan = $id;
                $anggota3->id_anggota = $request->anggota2;
                $anggota3->nama = User::findOrFail($request->anggota2)->name;
                $anggota3->jabatan = "Anggota 2";
                $anggota3->save();

                $request->id_pengguna = $laporan->id_pelapor;
                $request->title = "Laporan Pengaduan";
                $request->body = "Laporan Anda telah di terima";

                // $laporan->deskripsi_status = null;
            }
            if ($status == 0) {
                $request->id_pengguna = $laporan->id_pelapor;
                $request->title = "Laporan Pengaduah";
                $request->body = "Laporan Anda telah di tolak";
            }

            $notif = $this->PushNotificationController->sendPushNotification($request);
            // $notification = PushNotificationController::sendPushNotification($request);
            $data = new LaporanPengaduanResource($laporan);
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
        $laporan_id = Auth::user()->timPemeriksaPengaduan->pluck('id_laporan_pengaduan')->toArray();
        $query = LaporanPengaduan::findOrFail($laporan_id);
        $data = new LaporanPengaduanCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Laporan'
        ]);
    }
}
