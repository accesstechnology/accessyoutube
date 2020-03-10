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

        // $api = getenv('youtubeAPI');
        // $countryCode = getenv('countryCode');
        // $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$vidId.'&regionCode='.$countryCode.'&videoSyndicated=any&videoEmbeddable=true&videoDimension=2d&order=relevance&type=video&safeSearch=strict&maxResults=1&key='.$api;

        // $content = file_get_contents($url);
        // $json = json_decode($content, true);
        
        $output = shell_exec('youtube-dl -J ytsearch1:'.$v.' --flat-playlist' );
    
        $json = json_decode($output);
        // $v = rewrite($json['items'][0]['snippet']['title']);
        
        $v = rewrite($json->entries[0]->id);

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

        // $api = getenv('youtubeAPI');
        // $countryCode = getenv('countryCode');
        // $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$v.'&regionCode='.$countryCode.'&videoSyndicated=any&videoEmbeddable=true&videoDimension=2d&order=relevance&type=video&safeSearch=strict&maxResults=50&key='.$api;

        // $content = file_get_contents($url);
        // $json = json_decode($content, true);
        
        $output = shell_exec('youtube-dl -J ytsearch50:'.$v.' --flat-playlist' );
    
        $json = json_decode($output);
        
        
        // $vidId = $json['items'][$n]['id']['videoId'];
        $vidId = $json->entries[$n]->id;

        session(['n' => $n]);

        return redirect('play/'.$vidId);

    }


}
