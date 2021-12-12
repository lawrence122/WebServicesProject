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
	    'licenseNumber' => "ABC123",
		'licenseKey' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjbGllbnRJRCI6IjEiLCJleHAiOjE2NDQ1MzMwOTZ9.BkU6rVp9KLQLojql1CvCbVCqRx0kVziDkCl_NCrI59c",
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