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

        //YT API
        // $api = getenv('youtubeAPI');
         $countryCode = getenv('countryCode');
        // $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$v.'&regionCode='.$countryCode.'&videoSyndicated=any&videoEmbeddable=true&videoDimension=2d&order=relevance&type=video&safeSearch=strict&maxResults=12&key='.$api;
        // $content = file_get_contents($url);
        // $json = json_decode($content, true);
        
        
        //YT-DL
        $output = shell_exec('youtube-dl -J ytsearch12:'.$v.' --flat-playlist' );
        $json = json_decode($output);
        
        
//         //search-ajax
        
//         $url = "https://www.youtube.com/search_ajax?style=json&search_query=".$v."&videoSyndicated=any&videoEmbeddable=true&videoDimension=2d&order=relevance&type=video&safeSearch=strict&hl=".$countryCode;
        
//         // $url = "https://www.youtube.com/search_ajax?style=json&embeddable=123&search_query=".$v;
//         $opts = [
//     "http" => [
//         "method" => "GET",
//         "header" => "Accept-language: en\r\n" .
//             "YouTube-Restrict: Strict\r\n"
//             ]
//         ];

// $context = stream_context_create($opts);

        
        
//         $content = file_get_contents($url, false, $context);
//         $json = json_decode($content, true);

        $n=0;
          $i=1;
        //API
        // foreach($json['items'] as $item) {
        
        //YT-DL
        foreach ($json->entries as $item) {
        
        // //ajax serach
      
        // foreach ($json['video'] as $item){

            $link = new \stdClass;
            
            //FOR V3 API
            // $link -> vidId = $item['id']['videoId'];
            // $link -> title = $item['snippet']['title'];
            // $link -> thumb = $item['snippet']['thumbnails']['high']['url'];
            
            
            //FOR YT-DL
            $link -> vidId = $item->id;
            
            //serach ajax
            
            // $link -> vidId = $item['encrypted_id'];
            
            // if (isset($item['title'])) {
            // $link -> title = $item['title'];
            // }
            // else {
            //     $link -> title = $v;
            // }
            
            
            $link -> thumb = "https://img.youtube.com/vi/".$link->vidId."/hqdefault.jpg";

            if ($n+1 == 10){ $link -> accesskey = '0'; }
            elseif ($n+1 == 11){ $link -> accesskey = 'a'; }
            elseif ($n+1 == 12){ $link -> accesskey = 'b'; }
            else { $link -> accesskey = $n+1; }

            $links[] = $link;

            //temp store array of vidId relative to search result position for next video functionality
            // $request->session()->flash($item['id']['videoId'], $n);
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
