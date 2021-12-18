<?php
require_once("../core/Model.php");

class Client {

	public function __construct(){
		$this->Model = new Model();
	}

	public function getAllClients(){
		$stmt = $this->Model::$connection->prepare("SELECT * FROM client");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getClient($licenseNumber) {
		$stmt = $this->Model::$connection->prepare("SELECT * FROM client WHERE licenseNumber = :licenseNumber");
		$stmt->execute(['licenseNumber'=>$licenseNumber]);
		return $stmt->fetch();
	}

	public function insert() {
		$stmt = $this->Model::$connection->prepare("INSERT INTO client(clientName, licenseNumber, password_hash) 
											VALUES (:clientName, :licenseNumber, :password_hash)");

		return $stmt->execute(['clientName'=>$this->clientName, 
								'licenseNumber'=>$this->licenseNumber,
								'password_hash'=>$this->password_hash]);
	}

	public function updateKey() {
		$stmt = $this->Model::$connection->prepare("UPDATE client SET licenseStartDate=:licenseStartDate, 
										licenseEndDate=:licenseEndDate, licenseKey=:licenseKey 
										WHERE licenseNumber=:licenseNumber");
		$stmt->execute(['licenseNumber' => $this->licenseNumber, 
						'licenseKey' => $this->licenseKey,
						'licenseStartDate' => $this->licenseStartDate, 
						'licenseEndDate' => $this->licenseEndDate]);
	}

	public function updatePassword() {
		$stmt = $this->Model::$connection->prepare("UPDATE client SET password_hash=:password_hash WHERE clientID=:clientID");
		$stmt->execute(['password_hash'=>$this->password_hash,'clientID'=>$this->clientID]);
	}

	public function updateName() {
		$stmt = $this->Model::$connection->prepare("UPDATE client SET clientName = :clientName WHERE clientID = :clientID");
		$stmt->execute(['clientName'=>$this->clientName,'clientID'=>$this->clientID]);
	}

	public function delete() {
		$stmt = $this->Model::$connection->prepare("DELETE FROM client WHERE clientID = :clientID");
		$stmt->execute(['clientID'=>$this->clientID]);
	}
}