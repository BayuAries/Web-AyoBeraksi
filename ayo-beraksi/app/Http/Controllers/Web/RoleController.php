<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('role.view');
    }

    public function create()
    {
        return view('role.form');
    }

    public function show($id)
    {
        $data = array(
            'showRole' => Role::findOrFail($id),
            'id' => $id,
        );
        // return view('role.show', $data);
    }

    public function edit($id)
    {
        // $data = array(
        //     'showRole'  => Role::findOrFail($id),
        //     'id' => $id,
        // );
        return view('role.form');
    }
}
