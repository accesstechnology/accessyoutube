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

<<<<<<< HEAD
=======
        //YT API
        // $api = getenv('youtubeAPI');
         $countryCode = getenv('countryCode');
        // $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$v.'&regionCode='.$countryCode.'&videoSyndicated=any&videoEmbeddable=true&videoDimension=2d&order=relevance&type=video&safeSearch=strict&maxResults=12&key='.$api;
        // $content = file_get_contents($url);
        // $json = json_decode($content, true);
        
        //YT-DL
        // $output = shell_exec('youtube-dl -J ytsearch12:'.$v.' --flat-playlist' );
            // $json = json_decode($output);
        
//         //search-ajax
        
//         $url = "https://www.youtube.com/search_ajax?style=json&search_query=".$v."&videoSyndicated=any&videoEmbeddable=true&videoDimension=2d&order=relevance&type=video&safeSearch=strict&hl=".$countryCode;
        
    //     $url = "https://www.youtube.com/search_ajax?style=json&embeddable=123&search_query=".$v;
    //     $opts = [
    // "http" => [
    //     "method" => "GET",
    //     "header" => "Accept-language: en\r\n" .
    //         "YouTube-Restrict: Strict\r\n"
    //         ]
    //     ];

// $context = stream_context_create($opts);

        
//$url = "http://134.122.98.67:3000/api/search?q=".$v;
  $url = "http://178.128.163.153:3001/api/search?q=".$v;  
// Open the file using the HTTP headers set above

//function url_get_contents ($url) {
//    if (!function_exists('curl_init')){ 
//        die('CURL is not installed!');
//    }
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    $output = curl_exec($ch);
//    curl_close($ch);
//    return $output;
//}
$return = file_get_contents($url);

$json=json_decode($return);

>>>>>>> 1228b42fb862bfa37c344253b672c8b94c6ebb4c
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
