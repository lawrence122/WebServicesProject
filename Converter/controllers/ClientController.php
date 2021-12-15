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
		$client = new Client();
		$client = $client->getClient($licenseNumber);
		if (empty($client)) {
			return null;
		} else {
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
		} else {
			return null;
		}
	}
}
?>