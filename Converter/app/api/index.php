<?php
namespace App\api;

	spl_autoload_register("autoload");

	function autoload($classname) {
		if (preg_match('/[a-zA-Z]+Controller$/', $classname)) {
			require_once('../controllers/' . $classname . '.php');
			return true;
		} else {
			echo "Invalid classname format";
		}
	}

	$request = new \App\models\Request();
	$response = new \App\models\Response();

	// url_parameter format:  array(1) { ["client"]=> string(3) "all" }
	$keys = array_keys($request->url_parameters);
	if (!empty($keys)) {
		$controllerName = ucfirst($keys[0]) . "Controller"; // ucfirst capitalize the first character to match controller name

		if (class_exists($controllerName)) {
			switch ($request->verb) {
				case 'POST':
					if ($request->contentType == "application/json") {
						$data = json_decode(file_get_contents('php://input'), true);
						if(is_array($data)){
							$client = new \App\controllers\ClientController();
							$client = $client->getClient($data['licenseNumber']);

							if (!is_null($client)) {
								$jwt = new JWT();
								$jwt = $jwt->decode($client['licenseKey']);
								
								// Provide a new valide license if client doesn't have one or the one the client has is invalid
								if (is_null($client['licenseKey']) || is_null($jwt) || $client['licenseEndDate'] < date("Y-m-d h:i:sa")) {
									$jwt = new JWT();
									$jwt = $jwt->encode($client['clientID'], $client['licenseNumber'], strtotime("+2 Months"));

									$c = new \App\controllers\ClientController();
									$c->UpdateKey($client['licenseNumber'], $jwt, date("Y-m-d h:i:sa"), date("Y-m-d h:i:sa", strtotime("+5 Months")));
									$data['licenseKey'] = $jwt;
									$client = $c->getClient($client['licenseNumber']);
									echo "License Updated<br>";
								}

								if ($client['licenseKey'] == $data['licenseKey']) {
									$controller = new $controllerName();
									$response->payload = json_encode($controller->insert($data));
									echo $response->payload;
								} else {
									echo "Invalid license key";
								}
							} else {
								echo "Invalid license number";
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
						$response->payload = json_encode($controller->getAll());
					} else {
						echo "Only accept JSON data";
					}

					return $response->payload;
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