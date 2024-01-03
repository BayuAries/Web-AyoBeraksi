<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Actions\PushNotificationController;
use App\Http\Resources\LaporanPenyuapanCollection;
use App\Http\Resources\LaporanPenyuapanResource;
use App\Models\LaporanPenyuapan;
use App\Models\Permission;
use App\Models\TimPemeriksaPenyuapan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LaporanPenyuapanController extends Controller
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
                'jabatan' => 'required',
                'instansi' => 'required',
                'kasus_suap' => 'required',
                'lokasi' => 'required',
                'tanggal_kejadian' => 'required',
                'kronologis_kejadian' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            //save data
            $penyuapan = new LaporanPenyuapan();
            $penyuapan->nama_terlapor = $request->nama_terlapor;
            $penyuapan->jabatan = $request->jabatan;
            $penyuapan->instansi = $request->instansi;
            $penyuapan->id_pelapor = Auth::user()->id;
            $penyuapan->nama_pelapor = Auth::user()->name;
            $penyuapan->jabatan_pelapor = $request->jabatan_pelapor;
            $penyuapan->instansi_pelapor = $request->instansi_pelapor;
            $penyuapan->kasus_suap = $request->kasus_suap;
            $penyuapan->nilai_suap = $request->nilai_suap;
            $penyuapan->lokasi = $request->lokasi;
            $penyuapan->tanggal_kejadian = $request->tanggal_kejadian;
            $penyuapan->tanggal_pelaporan = Carbon::now()->format('Y-m-d');
            $penyuapan->kronologis_kejadian = $request->kronologis_kejadian;
            $penyuapan->status = $request->status;
            $penyuapan->deskripsi_status = $request->deskripsi_status;
            $penyuapan->save();

            $request->id_pengguna = Auth::user()->id;
            $request->title = "Laporan Penyuapan";
            $request->body = "Terimakasih telah melaporkan adanya penyuapan ke Ayo BerAksi";

            $notif = $this->PushNotificationController->sendPushNotification($request);
            // $notification = PushNotificationController::sendPushNotification($request);

            DB::commit();
            $message = 'Data Berhasil disimpan';
            return response()->json([
                'data' => $penyuapan,
                'message' => $message,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            // return ResponseHelper::response($th->getMessage(), 500);
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

    //GET Detail Laporan Penyuapan
    public function show($id)
    {
        try {
            $laporan = LaporanPenyuapan::findOrFail($id);
            return response()->json([
                'data' => $laporan,
                'message' => 'Data Berhasil ditampilkan',
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
                'jabatan' => 'required',
                'instansi' => 'required',
                'kasus_suap' => 'required',
                'lokasi' => 'required',
                'tanggal_kejadian' => 'required',
                'kronologis_kejadian' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            //save data
            $penyuapan = LaporanPenyuapan::findOrFail($id);
            $penyuapan->nama_terlapor = $request->nama_terlapor;
            $penyuapan->jabatan = $request->jabatan;
            $penyuapan->instansi = $request->instansi;
            $penyuapan->id_pelapor = Auth::user()->id;
            $penyuapan->nama_pelapor = Auth::user()->name;
            $penyuapan->jabatan_pelapor = $request->jabatan_pelapor;
            $penyuapan->instansi_pelapor = $request->instansi_pelapor;
            $penyuapan->kasus_suap = $request->kasus_suap;
            $penyuapan->nilai_suap = $request->nilai_suap;
            $penyuapan->lokasi = $request->lokasi;
            $penyuapan->tanggal_kejadian = $request->tanggal_kejadian;
            $penyuapan->tanggal_pelaporan = $request->tanggal_pelaporan;
            $penyuapan->kronologis_kejadian = $request->kronologis_kejadian;
            $penyuapan->status = $request->status;
            $penyuapan->deskripsi_status = $request->deskripsi_status;
            $penyuapan->save();

            $request->id_pengguna = Auth::user()->id;
            $request->title = "Laporan Penyuapan";
            $request->body = "Laporkan Penyuapan anda berhasil diperbarui";

            $notif = $this->PushNotificationController->sendPushNotification($request);
            // $notification = PushNotificationController::sendPushNotification($request);

            $data = new LaporanPenyuapanResource($penyuapan);
            DB::commit();
            $message = 'Data Berhasil diupdate';
            return response()->json([
                'data' => $data,
                'message' => $message,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            // return ResponseHelper::response($th->getMessage(), 500);
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
            $laporan = LaporanPenyuapan::findOrFail($id);
            $request = new Request();
            $request->id_pengguna = $laporan->id_pelapor;
            $request->title = "Laporan Penyuapan";
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
            // return ResponseHelper::response($th->getMessage(), 500);
            return response()->json([
                'succses' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function getList()
    {
        $query = LaporanPenyuapan::orderBy('tanggal_pelaporan', 'DESC')->get();
        $data = new LaporanPenyuapanCollection($query);
        $total = $query->count();
        return response()->json([
            'data' => $data,
            'total' => $total,
            'message' => 'Data List Laporan'
        ]);
    }

    public function getListPenugasan()
    {
        $laporan_id = Auth::user()->timPemeriksaPenyuapan->pluck('id_laporan_penyuapan')->toArray();
        $query = LaporanPenyuapan::findOrFail($laporan_id);
        $data = new LaporanPenyuapanCollection($query);
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
            $laporan = LaporanPenyuapan::findOrFail($id);
            $laporan->status = $request->status;
            $laporan->deskripsi_status = $request->deskripsi_status;
            $status = $laporan->status;
            $laporan->save();

            $detail = TimPemeriksaPenyuapan::where('id_laporan_penyuapan', $id)->delete();

            if ($status == 1) {
                $ketua = new TimPemeriksaPenyuapan();
                $ketua->id_laporan_penyuapan = $id;
                $ketua->id_anggota = $request->ketua;
                $ketua->nama = User::findOrFail($request->ketua)->name;
                $ketua->jabatan = "Ketua tim";
                $ketua->save();

                $anggota2 = new TimPemeriksaPenyuapan();
                $anggota2->id_laporan_penyuapan = $id;
                $anggota2->id_anggota = $request->anggota1;
                $anggota2->nama = User::findOrFail($request->anggota1)->name;
                $anggota2->jabatan = "Anggota 1";
                $anggota2->save();

                $anggota3 = new TimPemeriksaPenyuapan();
                $anggota3->id_laporan_penyuapan = $id;
                $anggota3->id_anggota = $request->anggota2;
                $anggota3->nama = User::findOrFail($request->anggota2)->name;
                $anggota3->jabatan = "Anggota 2";
                $anggota3->save();

                $request->id_pengguna = $laporan->id_pelapor;
                $request->title = "Laporan Penyuapan";
                $request->body = "Laporan anda telah di terima";

                $laporan->deskripsi_status = null;
            }
            if ($status == 0) {
                $request->id_pengguna = $laporan->id_pelapor;
                $request->title = "Laporan Penyuapan";
                $request->body = "Laporan anda telah di tolak";
            }

            $laporan->save();
            $notif = $this->PushNotificationController->sendPushNotification($request);
            // $notification = PushNotificationController::sendPushNotification($request);
            $data = new LaporanPenyuapanResource($laporan);
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
}
