<?php

function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	
	if(curl_exec($ch) === false) {
		echo 'Curl error: ' . curl_error($ch);
	} else {
		echo 'Operation completed without any errors';
	}
	
    // $output contains the output string 
    $output = curl_exec($ch); 
	
	
    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}


$data = http_request("https://idntemplate1.blogspot.com/2019/02/cara-baru-membuat-chat-room-multi.html");

echo $data

/*

function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}

$profile = http_request("https://api.github.com/users/petanikode");

// ubah string JSON menjadi array
$profile = json_decode($profile, TRUE);

echo "<pre>";
print_r($profile);
echo "</pre>";

*/

?>

