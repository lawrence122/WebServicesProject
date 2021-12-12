<?php

	// POST video with curl client
	// $ch = curl_init('http://localhost/WebServicesProject/Converter/api/video/convert');
	// $payload = json_encode(array('licenseNumber' => "2121011110",
	// 							'password_hash' => "passoword",
	// 							'licenseKey' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjbGllbnRJRCI6IjEiLCJleHAiOjE2NDQ2MDc2NjB9.SeP1Ox9ee3NWLDLf_4VkAltv6E7oIakhvTSFO6Zyaqg",
	// 							'originalFormat' => 'mp4',
	// 							'targetFormat'   => 'avi',
	// 							'file'   => 'C:\xampp\htdocs\Lab11\Input\Example.mp4'
	// 					));

	// Create user
	$ch = curl_init('http://localhost/WebServicesProject/Converter/api/client/password');
	$password_hash = password_hash("passoword", PASSWORD_DEFAULT);
	$payload = json_encode(array('clientName' => "TekName", 'licenseNumber' => "2121011110", 'password_hash' => $password_hash));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);

	if(curl_errno($ch)){
		echo 'Request Error:' . curl_error($ch);
	}
	// if (!$response) {
	//   die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
	// }

	// Close session to clear up resources
	curl_close($ch);
	echo $response;

	// GET with curl client
	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_URL, "http://localhost/Lab11/VideoConversionService/api/client/all");
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	// curl_exec($ch);
	// curl_close($ch);

?>