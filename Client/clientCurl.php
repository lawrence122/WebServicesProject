<?php

	// POST file with curl client
	$ch = curl_init('http://localhost/WebServicesProject/Converter/api/file/convert');
	$payload = json_encode(array('licenseNumber' => "182277294",
								'password_hash' => "passoword",
								'originalFormat' => 'txt',
								'targetFormat'   => 'pdf',
								'file'   => 'C:\xampp\htdocs\WebServicesProject\Converter\input\test.txt'
						));

	// POST video with curl client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/video/convert');
	// $payload = json_encode(array('licenseNumber' => "27313093",
	// 							'password_hash' => "passoword",
	// 							'originalFormat' => 'mp3',
	// 							'targetFormat'   => 'ogg',
	// 							'file'   => 'C:\xampp\htdocs\WebServicesProject\Converter\input\Example.mp3'
	// 					));

	// POST Create user
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/create');
	// $password_hash = password_hash("passoword", PASSWORD_DEFAULT);
	// $payload = json_encode(array('clientName' => "TekName", 'password_hash' => $password_hash));

	// Second part necessary for POST
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);
	curl_close($ch);
	echo $response;


	// PUT Change password
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/password');
	// $password_hash = password_hash("another", PASSWORD_DEFAULT);
	// $payload = json_encode(array('licenseNumber' => "17121122", 'password_hash' => $password_hash));

	// PUT Change name
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/name');
	// $payload = json_encode(array('clientName' => "Another Name", 'licenseNumber' => "17121122"));

	// Second part necessary for PUT
	// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// $response = curl_exec($ch);
	// curl_close($ch);
	// echo $response;


	// Delete client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/17121122');

	// Delete video
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/video/1');

	// Delete file
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/file/2');

	// Second part necessary for DELETE
	// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// $response = curl_exec($ch);
	// curl_close($ch);
	// echo $response;


	// GET with curl client
	// $ch = curl_init();
	// // curl_setopt($ch, CURLOPT_URL, "http://localhost/WebServicesProject/Converter/api/client/17121122");
	// curl_setopt($ch, CURLOPT_URL, "http://localhost/WebServicesProject/Converter/api/file/17121122");
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	// curl_exec($ch);
	// curl_close($ch);


	// HEAD request
	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_URL, "http://localhost/WebServicesProject/Converter/api/client/17121122");
	// curl_setopt($ch, CURLOPT_URL, "http://localhost/WebServicesProject/Converter/api/file/17121122");
	// curl_setopt($ch, CURLOPT_NOBODY, true);
	// curl_setopt($ch, CURLOPT_HEADER, true);
	// curl_exec($ch);
	// curl_close($ch);

?>