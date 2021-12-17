<?php

	// POST video with curl client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/file/convert');
	// $payload = json_encode(array('licenseNumber' => "130480399",
	// 							'password_hash' => "passoword",
	// 							'originalFormat' => 'md',
	// 							'targetFormat'   => 'txt',
	// 							'file'   => 'C:\xampp\htdocs\WebServicesProject\Converter\input\test.md'
	// 					));

	// POST file with curl client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/file/convert');
	// $payload = json_encode(array('licenseNumber' => "27313093",
	// 							'password_hash' => "passoword",
	// 							'originalFormat' => 'txt',
	// 							'targetFormat'   => 'docx',
	// 							'file'   => 'C:\xampp\htdocs\WebServicesProject\Converter\input\test.txt'
	// 					));

	// POST Create user
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/create');
	// $password_hash = password_hash("passoword", PASSWORD_DEFAULT);
	// $payload = json_encode(array('clientName' => "TekName", 'password_hash' => $password_hash));

	// curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// $response = curl_exec($ch);
	// curl_close($ch);
	// echo $response;

	// PUT Change password
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/password');
	// $password_hash = password_hash("passoword", PASSWORD_DEFAULT);
	// $payload = json_encode(array('licenseNumber' => "64908065", 'password_hash' => $password_hash));

	// PUT Change name
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/name');
	// $payload = json_encode(array('clientName' => "New Name", 'licenseNumber' => "64908065"));

	// Delete client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/130480399');

	// Delete video
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/video/7');

	// Delete file
	$ch = curl_init('http://localhost/WebServicesProject/Converter/api/file/1');

	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);
	curl_close($ch);
	echo $response;
	

	// GET with curl client
	// $ch = curl_init();
	//// curl_setopt($ch, CURLOPT_URL, "http://localhost/WebServicesProject/Converter/api/file/");
	// curl_setopt($ch, CURLOPT_URL, "http://localhost/WebServicesProject/Converter/api/file/64908065");
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	// curl_exec($ch);
	// curl_close($ch);

?>