<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            // $user = Auth::user();
            $user = User::where('email', request('email'))->first();
            $accsessToken =  $user->createToken('tokenAyoBeraksi')->accessToken;
            $success['accsessToken'] = $accsessToken;
            $success['name'] =  $user->name;
            $success['token_type'] = 'Bearer';
            // return response()->json(['success'=>$success], $this->successStatus);
            return response(['user' => Auth::user(), 'access_token' => $accsessToken]);
        } else {
            // return response()->json(['error'=>'Unauthorised'], 401);
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                // 'no_telp' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors(),
                ], 401);
            }
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] =  $user->createToken('nApp')->accessToken;
            $success['name'] =  $user->name;
    
            return response(['user' => $user, 'success'=>$success], $this->successStatus);    
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'succses' => false,
                'message' => $th->getMessage(),
            ],500);
        }
        
        // DB::beginTransaction();
        // try {
        //     $validator = Validator::make($request->all(), [
        //         'name' => 'required',
        //         'email' => 'required|email',
        //         'password' => 'required',
        //         // 'no_telp' => 'required',
        //     ]);

        //     if ($validator->fails()) {
        //         return response()->json([
        //             'success' => false,
        //             'message' => $validator->errors(),
        //         ], 401);
        //     }

        //     $input = $request->all();
        //     $input['password'] = bcrypt($input['password']);
        //     $user = User::create($input);
        //     $accsessToken =  $user->createToken('tokenAyoBeraksi')->accessToken;

        //     // $user = User::create([
        //     //     'name' => $request['name'],
        //     //     'email' => $request['email'],
        //     //     'password' => bcrypt($request['password']),
        //     //     'no_telp' => $request['no_telp'],          
        //     //     'nip' => $request['nip'],              
        //     //     'role_id' => $request['role_id'],
        //     //     'device_token' => $request['device_token'],
        //     // ]);

        //     // $user = new User();
        //     // $user->name = $request->name;
        //     // $user->email = $request->email;
        //     // $user->password = bcrypt($request->password);
        //     // $user->no_telp = $request->no_telp;          
        //     // $user->nip = $request->nip;              
        //     // $user->role_id = $request->role_id;
        //     // $user->device_token = $request->device_token;
        //     // $user->save();

        //     $accsessToken =  $user->createToken('tokenAyoBeraksi')->accessToken;
        //     $success['accsessToken'] = $accsessToken;
        //     $success['name'] =  $user->name;
        //     $success['token_type'] = 'Bearer';

        //     // return response()->json(['success'=>$success], $this->successStatus);
        //     return response(['user' => $user, 'access_token' => $accsessToken]);
        // } catch (Exception $e) {
        //     DB::rollback();
        //     // $errorCode = $e->errorInfo[1];
        //     // if ($errorCode == 1062) {
        //     //     return response()->json([
        //     //         'message' => 'Email Sudah digunakan',
        //     //     ], 500);
        //     // } else {
        //         return response()->json([
        //             'succses' => false,
        //             'message' => $e->getMessage(),
        //         ], 500);
        //     // }
        // }
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function logout()
    {
        if (Auth::user()) {
            $user = Auth::user()->token();
            $user->revoke();

            return response()->json([
                'succses' => true,
                'message' => 'Logout successfully'
            ]);
        } else {
            return response()->json([
                'succses' => true,
                'message' => 'Unable to logout'
            ]);
        }
    }

    // public function unauthorized() {
    //     return response()->json("unauthorized", 401);
    // }

    public function gantiNama(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }

        $newName = $request->name;
        $user = Auth::user();
        $user->name = $newName;
        $user->save();
        return response(['user' => Auth::user(), 'message' => 'Nama Berhasil diubah']);
    }

    public function gantiNoHP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_telp' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }

        $newTlp = $request->no_telp;
        $user = Auth::user();
        $user->no_telp = $newTlp;
        $user->save();
        return response(['user' => Auth::user(), 'message' => 'No Telepon Berhasil diubah']);
    }
}
