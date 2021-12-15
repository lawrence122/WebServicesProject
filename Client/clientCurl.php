<?php

	// POST video with curl client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/video/convert');
	// $payload = json_encode(array('licenseNumber' => "851697467",
	// 							'password_hash' => "passoword",
	// 							'licenseKey' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjbGllbnRJRCI6IjYiLCJleHAiOjE2NDIyODQwMTJ9.Ne6rc_sAULL3EGzLO5JsFv7IdHYn8hWY01XHu0yUmus",
	// 							'originalFormat' => 'mp4',
	// 							'targetFormat'   => 'ogg',
	// 							'file'   => 'C:\xampp\htdocs\WebServicesProject\Converter\input\Example.mp4'
	// 					));

	// Create user
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/create');
	// $password_hash = password_hash("passoword", PASSWORD_DEFAULT);
	// $payload = json_encode(array('clientName' => "Tekame", 'password_hash' => $password_hash));

	// Change password
	$ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/password');
	$password_hash = password_hash("pasoword", PASSWORD_DEFAULT);
	$payload = json_encode(array('clientName' => "TekName", 'licenseNumber' => "2121011110", 'password_hash' => $password_hash));

	// POST file with curl client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/file/convert');
	// $payload = json_encode(array('licenseNumber' => "2121011110",
	// 							'password_hash' => "pasoword",
	// 							'licenseKey' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjbGllbnRJRCI6IjQiLCJleHAiOjE2NDIyMDcwMTZ9.aOtT4njllBzY7M2uIQb_nKDxL9ioGz9haJk47KtrKkg",
	// 							'originalFormat' => 'txt',
	// 							'targetFormat'   => 'pdf',
	// 							'file'   => 'C:\xampp\htdocs\WebServicesProject\Converter\input\test.md'
	// 					));

	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);

	// if(curl_errno($ch)){
	// 	echo 'Request Error:' . curl_error($ch);
	// }
	curl_close($ch);
	echo $response;

	// GET with curl client
	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_URL, "http://localhost/WebServicesProject/Converter/api/video");
	// // curl_setopt($ch, CURLOPT_URL, "http://localhost/WebServicesProject/Converter/api/video/239129379");
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	// curl_exec($ch);
	// curl_close($ch);

?>