<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class search extends Controller
{

    public function index(Request $request, $v)
    {

        $request->session()->forget('v');
        $request->session()->forget('n');

        $api = getenv('youtubeAPI');
        $countryCode = getenv('countryCode');
        $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$v.'&regionCode='.$countryCode.'&videoSyndicated=any&videoEmbeddable=true&videoDimension=2d&order=relevance&type=video&safeSearch=strict&maxResults=12&key='.$api;

        $content = file_get_contents($url);
        $json = json_decode($content, true);

        $n=0;

        foreach($json['items'] as $item) {

            $link = new \stdClass;
            $link -> vidId = $item['id']['videoId'];
            $link -> title = $item['snippet']['title'];
            $link -> thumb = $item['snippet']['thumbnails']['high']['url'];

            if ($n+1 == 10){ $link -> accesskey = '0'; }
            elseif ($n+1 == 11){ $link -> accesskey = 'a'; }
            elseif ($n+1 == 12){ $link -> accesskey = 'b'; }
            else { $link -> accesskey = $n+1; }

            $links[] = $link;

            //temp store array of vidId relative to search result position for next video functionality
            $request->session()->flash($item['id']['videoId'], $n);
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
