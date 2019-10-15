<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->forget('v');
        $request->session()->forget('n');

//         $api = getenv('youtubeAPI');
//         $countryCode = getenv('countryCode');
//         $url = 'https://www.googleapis.com/youtube/v3/videos?chart=mostPopular&part=snippet&regionCode='.$countryCode.'&maxResults=4&key='.$api;

//         $content = file_get_contents($url);
//         $json = json_decode($content, true);

//         $n=0;

//         foreach($json['items'] as $item) {

//             $link = new \stdClass;

//             $link -> vidId = $item['id'];
//             $link -> title = $item['snippet']['title'];
//             $link -> thumb =$item['snippet']['thumbnails']['high']['url'];

//             if ($n+1 == 10){ $link -> accesskey = '0'; }
//             elseif ($n+1 == 11){ $link -> accesskey = 'a'; }
//             elseif ($n+1 == 12){ $link -> accesskey = 'b'; }
//             else { $link -> accesskey = $n+1; }

//             $links[] = $link;

//             //temp store array of vidId relative to search result position for next video functionality
//             // $request->session()->flash($item['id']['videoId'], $n);
//             $n++;

//         }

//     	$data = [
        // 			'links' => $links,
        // 		];

        session(['v' => '']);

        return view('home');

        // return view('home')->with($data);
    }
}
