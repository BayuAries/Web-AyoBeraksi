<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('login');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('index');
    }

    public function redirect()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login');
    }

    public function home()
    {
        return view('dashboard');
    }

    //Test FCM
    public function fcmTest()
    {
        return view('fcmtest');
    }
}
