<?php
	require("../../vendor/autoload.php");
	use GuzzleHttp\Client;

	$client = new \GuzzleHttp\Client();

	// GET Method
	// $res = $client->request('GET', 'http://localhost/Lab11/VideoConversionService/api/video/all', [
	// 			'headers' => [
	// 				'Accept'     => 'application/json',
	// 				'Content-Type' => 'application/json'
	// 			]
	// 		]);
	// // echo "Status code: " . $res->getStatusCode() . "<br>";
	// // echo "Header Content-Type: " . $res->getHeader('content-type')[0] . "<br>";
	// echo $res->getBody() . "<br>";

	// POST Method
	$data = array(
	    'licenseNumber' => "DCE365",
		'licenseKey' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjbGllbnRJRCI6IjIiLCJleHAiOjE2NDMyMTM1NTZ9.Vw6KG5SI1gqqHj9gjxlgNMfMMV58SOp2UlG3Bfh53Kk",
		'originalFormat' => 'mp4',
		'targetFormat'   => 'avi',
		'file'   => 'C:\xampp\htdocs\Lab11\Input\Example.mp4'
	);

	$res = $client->request('POST', 'http://localhost/Lab11/VideoConversionService/api/video/convert', [
				'headers' => [
					'Accept'     => 'application/json',
					'Content-Type' => 'application/json'
				],
				'body' => json_encode($data),
		]);
	echo $res->getBody();
?>