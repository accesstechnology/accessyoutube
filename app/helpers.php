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

    $url = "http://178.128.163.153:3001/api/search?q=".$v;
        
    // Open the file using the HTTP headers set above
    $return = file_get_contents($url);
    
    $json=json_decode($return);
    
    return $json;
}
