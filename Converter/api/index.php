<?php
	require_once("../api/Request.php");
	require_once("../api/Response.php");
	require_once("../api/JWT.php");
	require_once("../api/LicenseNumber.php");

	spl_autoload_register("autoload");

	function autoload($classname) {
		if (preg_match('/[a-zA-Z]+Controller$/', $classname)) {
			require_once('../controllers/' . $classname . '.php');
			return true;
		} else {
			echo "Invalid classname format";
		}
	}

	function updateKey($clientID, $licenseNumber)
	{
		$jwt = new JWT();
		$jwt = $jwt->encode($clientID, $licenseNumber, strtotime("+1 Months"));
		$c = new ClientController();
		$c->UpdateKey($licenseNumber, $jwt, date("Y-m-d h:i:sa"), date("Y-m-d h:i:sa", strtotime("+1 Months")));
	}

	// $request = new \api\Request();
	$request = new Request();
	$response = new Response();

	// url_parameter format:  array(1) { ["client"]=> string(3) "all" }
	$keys = array_keys($request->url_parameters);
	$values = array_values($request->url_parameters);

	if (!empty($keys)) {
		$controllerName = ucfirst($keys[0]) . "Controller"; // ucfirst capitalize the first character to match controller name

		if (class_exists($controllerName)) {
			switch ($request->verb) {
				case 'POST':
					if ($request->contentType == "application/json") {
						$data = json_decode(file_get_contents('php://input'), true);
						if(is_array($data)){
							if ($controllerName == "ClientController") {
								// Check the url parameters
								if (!is_null(ucfirst($values[0]))) {
									switch (ucfirst($values[0])) {
										case "Create":
											// Registers a client
											$licenseNumber = new LicenseNumber();
											$licenseNumber = $licenseNumber->generateLicenseNumber();

											$c = new ClientController();
											$c->insert($data['clientName'], $licenseNumber, $data['password_hash']);
											$client = $c->getClient($licenseNumber);

											updateKey($client['clientID'], $licenseNumber);
											echo "Client created " . $data['clientName'] 
													. ". Here is your license number: " 
													. $licenseNumber . "<br>It is valid for a month.";
											break;
										case 'Password':
											// Updates user password
											$client = new ClientController();
											$client = $client->UpdatePassword($data['licenseNumber'], $data['password_hash']);
											if (!is_null($client) && !empty($client)) {
												echo "Password Updated.";
											} else {
												echo "Invalid License Number.";
											}
											break;
										default:
											echo "Invalid URL";
											break;
									}
								} else {
									echo "Please specify what you want to do.";
								}
							} else {
								// Conversion
								$client = new ClientController();
								$client = $client->getClient($data['licenseNumber']);

								// Checks if a client with the given license number is registered
								if (!is_null($client)) {
									if (password_verify($data['password_hash'], $client['password_hash'])) {
										$jwt = new JWT();
										$jwt = $jwt->decode($client['licenseKey']);
										
										// Provide a new valide license if client doesn't have one or the one the client has is invalid
										if (is_null($client['licenseKey']) || is_null($jwt) || $client['licenseEndDate'] < date("Y-m-d h:i:sa")) {
											$data['licenseKey'] = updateKey($client['clientID'], $licenseNumber);
											$client = $c->getClient($client['licenseNumber']);
											echo "License Updated<br>";
										}

										// Check if given license key mathces license saved in database
										if ($client['licenseKey'] == $data['licenseKey']) {
											$controller = new $controllerName();
											$response->payload = json_encode($controller->insert($data));
											echo $response->payload;
										} else {
											echo "Invalid license key";
										}
									} else {
										echo "Wrong password.";
									}
								} else {
									echo "Invalid license number";
								}
							}
						} else {
							echo "Received invalid JSON!";
						}
					}  else {
						echo "Only accept JSON data";
					}
					break;

				case 'GET':
					$controller = new $controllerName();

					if ($request->accept == "application/json") {
						echo "Values 1: " . $values[0] . "<br>";
						// if (!is_null(ucfirst($values[0]) && !empty($values[0]))) {
						// 	echo "Values 2: " . $values[0] . "<br>";
						// 	$response->payload = json_encode($controller->getAllFromClient($values[0]));
						// 	echo $response->payload;
						// } else {
							$response->payload = json_encode($controller->getAll());
							echo $response->payload;
						// }
					} else {
						echo "Only accept JSON data";
					}
					break;
				
				default:
					echo "Cannot handle this type of request";
					break;
			}
			
		} else {
			echo $controllerName . " does not exist!";
		}
	} else {
		echo "Requires parameter";
	}

?>