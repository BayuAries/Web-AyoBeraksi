<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
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
                'nama' => 'required',
                'kode' => 'required|unique:roles',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }
            $role = new Role();
            $role->nama = $request->nama;
            $role->kode = $request->kode;
            $role->save();
            if ($request->filled('permission_id')) {
                $role->permissions()->attach($request->permission_id);
            }
            $data = new RoleResource($role);
            DB::commit();

            $message = 'Data Role Berhasil disimpan';
            return response()->json([
                'data' => $data,
                'message' => $message,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'succses' => false,
                'message' => $th->getMessage(),
            ],500);
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
        $data = Role::with('permissions:id,nama')->where('id', $id)->get();
        return response()->json([
            'data' => $data,
            'message' => 'Data Role Berhasil ditampilkan',
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
            $role = Role::findOrFail($id);
            $role->nama = $request->nama;
            $role->kode = $request->kode;
            $role->save();

            if ($request->filled('permission_id')) {
                $role->permissions()->sync($request->permission_id);
            }

            $data = new RoleResource($role);
            DB::commit();

            $message = 'Data Role Berhasil disimpan';
            return response()->json([
                'data' => $data,
                'message' => $message,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'succses' => false,
                'message' => $th->getMessage(),
            ],500);
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
            if ($id == 1) {
                return response()->json(['message' => 'Forbidden'],403);
            }
            $data = Role::findOrFail($id);
            $data->delete();
            DB::commit();
            return response()->json([
                'data' => $data,
                'message' => 'Data Role Berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'succses' => false,
                'message' => $th->getMessage(),
            ],500);
        }
    }

    public function getList()
    {
        // $query = Role::orderBy('id', 'ASC')->get();
        $id = Role::with('permissions:id,nama')->get();
        $data = new RoleCollection($id);
        return response()->json([
            'data' => $data,
            'message' => 'Get data List',
        ]);
    }
}
