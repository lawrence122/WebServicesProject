<?php

//for each datetime to convert it from UTC to the local time....
//1 - make a datetime with utc timezone with that datetime
//2 - get the local timezone
//3 - set the local timezone
//4 - format and output

function ConvertDateTime($datetime){
	$date = new DateTime($datetime, new DateTimezone("UTC"));
	$tz = new DateTimeZone(date_default_timezone_get());
	$date->setTimeZone($tz);
	return $date->format('Y-m-d H:i:sP e');
}

//Uses URL to get data from endpoints on the web
//Provides cURL as param and returns string result
//cURL = client URL
function getData($url, $followLocation = true, $method = 'GET', $data = []) {
	$curl = curl_init();
	$cookieFile = "curl_cookies.txt";
	if (substr(PHP_OS, 0, 3) == 'WIN') {
		$cookieFile = str_replace('\\', '/', getcwd().'/'.$cookieFile);
	}

	$options = array(
		CURLOPT_URL => $url, //URL of endpoint to request
		CURLOPT_RETURNTRANSFER => true, //forces output as a string to a variable
		CURLOPT_TIMEOUT => 30, //sets max time for request before exiting
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, //1.1 is currently supported
		CURLOPT_FOLLOWLOCATION => $followLocation, //redirects request as instructed in the response headers
		CURLOPT_CUSTOMREQUEST => $method, //$method can be GET, POST, DELETE, PUT
		CURLOPT_POSTFIELDS => $data, //data to submit
		CURLOPT_COOKIEJAR => $cookieFile,
		CURLOPT_COOKIEFILE => $cookieFile,
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache" //request uncached/fresh responses
		)
	);

	curl_setopt_array($curl, $options);
	$response = curl_exec($curl);
	curl_close($curl); 

	return $response;
}
?>