<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeedbackCollection;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
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
                'bintang_kepuasan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            // save data
            $feedback = new Feedback();
            $feedback->bintang_kepuasan = $request->bintang_kepuasan;
            $feedback->respon_kepuasan = $request->respon_kepuasan;
            $feedback->alasan = $request->alasan;
            if($request->id_pengguna)
            {
                $feedback->id_pengguna=$request->id_pengguna;
            }
            $feedback->nama_pengguna = $request->nama_pengguna;
            $feedback->save();
            DB::commit();
            $message = 'Data Feedback Berhasil disimpan';
            return response()->json([
                'data' => $feedback,
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
        $feedback = Feedback::findOrFail($id);
        return response()->json([
            'data' => $feedback,
            'message' => 'Data Feedback Berhasil ditampilkan',
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
                'bintang_kepuasan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }

            // save data
            $feedback = Feedback::findOrFail($id);
            $feedback->bintang_kepuasan = $request->bintang_kepuasan;
            $feedback->respon_kepuasan = $request->respon_kepuasan;
            $feedback->alasan = $request->alasan;
            if($request->id_pengguna)
            {
                $feedback->id_pengguna=$request->id_pengguna;
            }
            $feedback->nama_pengguna = User::findOrFail($request->id_pelapor)->name;
            $feedback->save();
            DB::commit();
            $message = 'Data Feedback Berhasil diupdate';
            return response()->json([
                'data' => $feedback,
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
            $feedback = Feedback::findOrFail($id);
            $feedback->delete();
            DB::commit();
            return response()->json([
                'data' => $feedback,
                'message' => 'Data Feedback Berhasil dihapus',
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
        $query = Feedback::all();
        $data = new FeedbackCollection($query);
        return response()->json([
            'data' => $data,
            'message' => 'Get data List',
        ]);
    }
}
