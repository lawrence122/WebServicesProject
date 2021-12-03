<?php

	// POST with curl client
	$ch = curl_init('http://localhost/Lab11/VideoConversionService/api/video/convert');
	$payload = json_encode(array('licenseNumber' => "ABC123",
								'licenseKey' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjbGllbnRJRCI6IjMiLCJleHAiOjE2NDMyMTM5NDF9.y5N_vGY24L6CdiujHz8ixFsJhBjh3SCBR3KrJeLh1nI",
								'originalFormat' => 'mp4',
								'targetFormat'   => 'avi',
								'file'   => 'C:\xampp\htdocs\Lab11\Input\Example.mp4'
						));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);

	if (!$response) {
	  die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
	}

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