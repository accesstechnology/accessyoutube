<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class play extends Controller
{
    public function index(Request $request, $vidId)
    {

        if ($request->session()->has('v')) {
        $v = session('v');
        }
        else {
        
        $json = search($v);
        
        $v = rewrite($json->results[0]->id);

        session(['v' => $v]);

        }

        if ($request->session()->has('n')) {
            $n = session('n');
        }
        elseif ($request->session()->has($vidId)){
        $n = session($vidId);
        session(['n' => $n]);
        }
        else {
            $n=0;
        }
        
        if (!isset($v)){
            session()->flash('message', "Sorry, there was a problem with playing that video. Don't worry, we'll fix it shortly!");
            Log::critical('missing $v on play?');
            return redirect('/');
        }

        $data=[
            'n' => $n,
            'v' => $v,
            'vidId' => $vidId
            ];

        return view('play')->with($data);

    }

    public function next()
    {

        $v = session('v');
        $n = session('n');

        $n++;

        $json = search($v);
        
        $vidId = $json->results[$n]->id;

        session(['n' => $n]);

        return redirect('play/'.$vidId);

    }


}
