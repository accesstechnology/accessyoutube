<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class search extends Controller
{

    public function index(Request $request, $v)
    {
        
        $v = str_replace("'","",$v);

        $request->session()->forget('v');
        $request->session()->forget('n');

        // $api = getenv('youtubeAPI');
        // $countryCode = getenv('countryCode');
        // $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$v.'&regionCode='.$countryCode.'&videoSyndicated=any&videoEmbeddable=true&videoDimension=2d&order=relevance&type=video&safeSearch=strict&maxResults=12&key='.$api;

        // $content = file_get_contents($url);
        // $json = json_decode($content, true);
        
        $output = shell_exec('youtube-dl -J ytsearch12:'.$v.' --flat-playlist' );
    
        $json = json_decode($output);

        $n=0;


        // dd($json);
        // foreach($json['items'] as $item) {
        foreach ($json->entries as $item) {

            $link = new \stdClass;
            // $link -> vidId = $item['id']['videoId'];
            // $link -> title = $item['snippet']['title'];
            // $link -> thumb = $item['snippet']['thumbnails']['high']['url'];
            
            $link -> vidId = $item->id;
            
            if (isset($item->title)) {
            $link -> title = $item->title;
            }
            else {
                $link -> title = $v;
            }
            $link -> thumb = "https://img.youtube.com/vi/".$item->id."/hqdefault.jpg";

            if ($n+1 == 10){ $link -> accesskey = '0'; }
            elseif ($n+1 == 11){ $link -> accesskey = 'a'; }
            elseif ($n+1 == 12){ $link -> accesskey = 'b'; }
            else { $link -> accesskey = $n+1; }

            $links[] = $link;

            //temp store array of vidId relative to search result position for next video functionality
            // $request->session()->flash($item['id']['videoId'], $n);
            $request->session()->flash($item->id, $n);
            $n++;

        }

    	$data = [
			'links' => $links,
			'v' => $v
		];

		session(['v' => $v]);

    return view('results')->with($data);

    }


}
