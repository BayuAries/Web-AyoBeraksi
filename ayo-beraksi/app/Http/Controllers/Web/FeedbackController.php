<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\LaporanHelper as LprHelper;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback.view');
    }

    public function create()
    {
        return view('');
    }

    public function show($id)
    {
        $data = array(
            'showFeedback' => LprHelper::showFeedback($id),
            'id' => $id,
        );
        return view('feedback.show', $data);
    }

    public function edit($id)
    {
        // $data = array(
        //     'showFeedback' => LprHelper::showFeedback($id),
        //     'id' => $id,
        // );
        return view('');
    }
}
