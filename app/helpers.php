<?php      

function rewrite ($v) {

   if  ((!empty($v)) && (trim($v) != '')) {

        //tidy up multiple spaces within string

        while (strpos($v,'  ') !== false) {$v = str_replace('  ', ' ', $v);}

        //if first or last character is a space, remove it

        $v= ltrim ($v,' ');  $v= rtrim ($v,' ');

        //url encode
        $v = urlencode($v);

   }

    else {

        $v='';

    }

    return $v;
}


function search ($v) {

    $url = "http://youtubescraper_node_1:3000/api/search?q=".$v;
        
    $return = file_get_contents($url);
    
    $json=json_decode($return);
    
    return $json;
}
