<?php

	// POST video with curl client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/video/convert');
	// $payload = json_encode(array('licenseNumber' => "705485387",
	// 							'password_hash' => "passoword",
	// 							'originalFormat' => 'mp4',
	// 							'targetFormat'   => 'ogg',
	// 							'file'   => 'C:\xampp\htdocs\WebServicesProject\Converter\input\file.mp4'
	// 					));

	// Create user
	$ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/create/');
	$password_hash = password_hash("passoword", PASSWORD_DEFAULT);
	$payload = json_encode(array('clientName' => "TekName", 'password_hash' => $password_hash));

	// Change password
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/password');
	// $password_hash = password_hash("something", PASSWORD_DEFAULT);
	// $payload = json_encode(array('licenseNumber' => "851697467", 'password_hash' => $password_hash));

	// Change name
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/changeName');
	// $payload = json_encode(array('clientName' => "New Name", 'licenseNumber' => "130480399"));

	// POST file with curl client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/file/convert');
	// $payload = json_encode(array('licenseNumber' => "851697467",
	// 							'password_hash' => "something",
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