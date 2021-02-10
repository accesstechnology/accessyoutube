<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Goutte\Client as Goutte;
use Illuminate\Support\Facades\Log;


class search extends Controller
{

    public function index(Request $request, $v)
    {
        
        //hacky workaround for blank searches. something to do with Larvel 8 and using both get&post

        if($v=='v') {return redirect('/');}
        $v = str_replace("'","",$v);

        $request->session()->forget('v');
        $request->session()->forget('n');

        $n=0;
        $i=1;
        
        $json = search($v);

        if (!isset($json->results)) {
            session()->flash('message', "Sorry, there was a problem with that video search. Don't worry, we'll fix it shortly!");
            Log::critical("no results - ".$v);
            return redirect('/');
        }
             
             
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
        
        if (!isset($links)) {
            session()->flash('message', "Sorry, there was a problem with that video search. Don't worry, we'll fix it shortly!");
            Log::critical("no links - ".$v);
            return redirect('/');
        }

    	$data = [
			'links' => $links,
			'v' => $v
		];
		

		session(['v' => $v]);

    return view('results')->with($data);

    }


}
