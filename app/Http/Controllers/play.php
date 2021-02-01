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
        
        $json = search($vidId);
        
            if (isset($json->results)) {
            
                foreach ($json->results as $item) {
                    
                    session(['v' => $item->title]);
                    
                    $v = session('v');
                    
                    break;
            
                }
    
            }
        }
            
        //preventing errors - shouldn't be necessary, but it is...
        if(!isset($v)) {$v=$vidId;}
                
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
        
        if ($n=20) {$n=0;}

        $json = search($v);
        
        $vidId = $json->results[$n]->id;

        session(['n' => $n]);

        return redirect('play/'.$vidId);

    }


}
