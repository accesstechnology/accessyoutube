<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Goutte\Client as Goutte;

class search extends Controller
{

    public function index(Request $request, $v)
    {
        
        $v = str_replace("'","",$v);

        $request->session()->forget('v');
        $request->session()->forget('n');

        $n=0;
        $i=1;
        
        $json = search($v);

        foreach ($json->results as $item) {
        
            $link = new \stdClass;
            
            $link -> vidId = $item->id;
            $link -> title = $item->title;

            $link -> thumb = "https://img.youtube.com/vi/".$link->vidId."/hqdefault.jpg";

            if ($n+1 == 10){ $link -> accesskey = '0'; }
            elseif ($n+1 == 11){ $link -> accesskey = 'a'; }
            elseif ($n+1 == 12){ $link -> accesskey = 'b'; }
            else { $link -> accesskey = $n+1; }

            $links[] = $link;

            $request->session()->flash($link->vidId, $n);
            $n++;
            
            if ($i++ == 12) break;

        }

    	$data = [
			'links' => $links,
			'v' => $v
		];

		session(['v' => $v]);

    return view('results')->with($data);

    }


}
