<?php

function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
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

$profile = http_request("https://reqres.in/api/users");

// ubah string JSON menjadi array
$profile = json_decode($profile, TRUE);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Curl Data JSON</title>
</head>

<body>

<!--<img src="qeqwq" width="64" />-->
<br>
<p>
<?php 
//echo "<pre>";
//print_r($profile);
//echo "</pre>";
	foreach($profile["data"] as $profile1 => $value) {
		//die(var_dump($value));
		echo "ID: ".$value["id"]."<br/>";
		echo "Nama:".$value["first_name"]."<br>";
		echo "Email: ".$value["email"]."<br>";
		echo "Last Name: ".$value["last_name"];
	}
?>

</p>

</body>
</html>