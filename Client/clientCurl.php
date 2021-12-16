<?php

	// POST video with curl client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/video/convert');
	// $payload = json_encode(array('licenseNumber' => "851697467",
	// 							'password_hash' => "something",
	// 							'licenseKey' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjbGllbnRJRCI6IjYiLCJleHAiOjE2NDIyODQwMTJ9.Ne6rc_sAULL3EGzLO5JsFv7IdHYn8hWY01XHu0yUmus",
	// 							'originalFormat' => 'avi',
	// 							'targetFormat'   => 'mp3',
	// 							'file'   => 'C:\xampp\htdocs\WebServicesProject\Converter\input\Example.avi'
	// 					));

	// Create user
	$ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/create');
	$password_hash = password_hash("passoword", PASSWORD_DEFAULT);
	$payload = json_encode(array('clientName' => "TekName", 'password_hash' => $password_hash));

	// Change password
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/password');
	// $password_hash = password_hash("something", PASSWORD_DEFAULT);
	// $payload = json_encode(array('clientName' => "TekName", 'licenseNumber' => "851697467", 'password_hash' => $password_hash));

	// POST file with curl client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/file/convert');
	// $payload = json_encode(array('licenseNumber' => "851697467",
	// 							'password_hash' => "something",
	// 							'licenseKey' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjbGllbnRJRCI6IjYiLCJleHAiOjE2NDIyODQwMTJ9.Ne6rc_sAULL3EGzLO5JsFv7IdHYn8hWY01XHu0yUmus",
	// 							'originalFormat' => 'md',
	// 							'targetFormat'   => 'tiff',
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
	// // curl_setopt($ch, CURLOPT_URL, "http://localhost/WebServicesProject/Converter/api/file/");
	// curl_setopt($ch, CURLOPT_URL, "http://localhost/WebServicesProject/Converter/api/file/1535414434");
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	// curl_exec($ch);
	// curl_close($ch);

?>