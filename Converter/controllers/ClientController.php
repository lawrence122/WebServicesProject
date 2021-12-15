<?php
require_once("../models/Client.php");

class ClientController {
	function getAll() {
		$clients = new Client();
		return $clients->getAllClients();
	}

	function insert($clientName, $licenseNumber, $password_hash) {
		$client = new Client();
		$client->clientName = $clientName;
		$client->licenseNumber = $licenseNumber;
		echo "Insert License number: " . $licenseNumber . "<br>";
		$client->password_hash = $password_hash;
		$client->insert();
	}

	function getClientID($licenseKey) {
		$client = new Client();
		$client = $client->getClientID($licenseKey);
		if (empty($client)) {
			return false;
		} else {
			return $client['clientID'];
		}
	}

	function getClient($licenseNumber) {
		// echo "GetClient<br>";
		// echo "GetClient License number 1: " . $licenseNumber . "<br>Client: ";
		$client = new Client();
		$client = $client->getClient($licenseNumber);
		// var_dump($client);
		// echo "<br>";
		if (empty($client)) {
			// echo "Not found<br>";
			return null;
		} else {
			// echo "GetClient License number 2: " . $client['licenseNumber'] . "<br>";
			// echo "found<br>";
			return $client;
		}
	}

	function UpdateKey($licenseNumber, $licenseKey, $licenseStartDate, $licenseEndDate) {
		$client = new Client();
		$client->licenseNumber = $licenseNumber;
		$client->licenseKey = $licenseKey;
		$client->licenseStartDate = $licenseStartDate;
		$client->licenseEndDate = $licenseEndDate;
		$client->updateKey();
	}

	function UpdatePassword($licenseNumber, $password_hash) {
		$c = new ClientController();
		$c = $c->getClient($licenseNumber);
		if (!is_null($c)) {
			$client = new Client();
			$client->clientID = $c['clientID'];
			$client->password_hash = $password_hash;
			$client->updatePassword();
			return true;
		} else {
			return false;
		}
	}
}
?>