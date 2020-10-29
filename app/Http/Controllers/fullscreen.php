<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class fullscreen extends Controller
{
    public function index(Request $request, $vidId)
    {

        $data=[
            'vidId' => $vidId
            ];

        return view('fullscreen')->with($data);

    }


}