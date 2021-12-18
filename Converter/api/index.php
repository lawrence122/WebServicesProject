<?php
	require_once("../api/Request.php");
	require_once("../api/Response.php");
	require_once("../api/JWT.php");
	require_once("../api/LicenseNumber.php");
	require_once("../../Client/awsClient.php");

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
						if(is_array($data)) {
							if ($controllerName == "ClientController") {
								if (ucfirst($values[0]) == "Create") {
									// Registers a client
									$licenseNumber = new LicenseNumber();
									$licenseNumber = $licenseNumber->generateLicenseNumber();

									$c = new ClientController();
									$c->insert($data['clientName'], $licenseNumber, $data['password_hash']);
									$client = $c->getClient($licenseNumber);

									updateKey($client['clientID'], $licenseNumber);
									echo $licenseNumber;
								} else {
									echo "Invalid URL";
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
											$client = $c->getClient($client['licenseNumber']);
											echo "License Updated<br>";
										}

										$controller = new $controllerName();
										$conversion = json_encode($controller->insert($data));
										if (!str_contains($conversion, "Error") && !str_contains($conversion, "Invalid")) {
											$aws = new AWSClient();
											$conversion = json_decode($conversion, true);
											$response->payload = $aws->download($conversion['key'], $data['saveAs']);
										} else {
											$response->payload = $conversion;
										}
										echo $response->payload;
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
					switch ($values[0]) {
						case "":
							echo "Specify a license number";
							break;
						default:
							if (ucfirst($keys[0]) == "Client") {
								echo json_encode($controller->getClient($values[0]));
							} else {
								echo json_encode($controller->getAllFromClient($values[0]));
							}
							break;
					}
					break;

				case 'DELETE':
					// Delete client, file, or video
					$controller = new $controllerName();
					$response->payload = $controller->delete($values[0]);
					echo $response->payload;
					break;

				case 'PUT':
					if ($request->accept == "application/json") {
						if (ucfirst($keys[0]) == "Client") {
							$data = json_decode(file_get_contents('php://input'), true);
							if(is_array($data)) {
								switch (ucfirst($values[0])) {
									case 'Password':
										// Updates user password
										$client = new ClientController();
										if ($client->UpdatePassword($data['licenseNumber'], $data['password_hash'])) {
											$response->payload = "Password Updated.";
										} else {
											$response->payload = "Invalid License Number.";
										}
										echo $response->payload;
										break;
									case 'Name':
										// Updates client name
										$client = new ClientController();
										if ($client->UpdateName($data['licenseNumber'], $data['clientName'])) {
											$response->payload = "Name Updated.";
										} else {
											$response->payload = "Invalid License Number.";
										}
										echo $response->payload;
										break;
									}
								} else {
								echo "Received invalid JSON!";
							}
						} else {
							echo "You can only modify a client";
						}
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