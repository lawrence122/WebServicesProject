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
			return true;
		} else {
			return false;
		}
	}

	function UpdateName($licenseNumber, $clientName) {
		$c = new ClientController();
		$c = $c->getClient($licenseNumber);
		if (!is_null($c)) {
			$client = new Client();
			$client->clientID = $c['clientID'];
			$client->clientName = $clientName;
			$client->updateName();
			return true;
		} else {
			return false;
		}
	}

	function delete($licenseNumber) {
		$c = new ClientController();
		$c = $c->getClient($licenseNumber);

		if (!is_null($c)) {
			$files = new FileController();
			$videos = new VideoController();

			if (!empty($files->getAllFromClient($licenseNumber))) {
				$files->deleteWithLicense($licenseNumber);
			}
			if (!empty($videos->getAllFromClient($licenseNumber))) {
				$videos->deleteWithLicense($licenseNumber);
			}
			
			$client = new Client();
			$client->clientID = $c['clientID'];
			$client->delete();
			return "Client successfully deleted";
		} else {
			return "This client does not exist";
		}
	}
}
?>