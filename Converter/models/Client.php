<?php
require_once("../core/Model.php");

class Client {

	public function __construct(){
		$this->Model = new Model();
	}

	// public function isValid(){
	// 	return !empty($this->username) && !password_verify('', $this->password_hash);
	// }

	public function getAllClients(){
		$stmt = $this->Model::$connection->prepare("SELECT * FROM client");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function getClientID($licenseKey) {
		$stmt = $this->Model::$connection->prepare("SELECT clientID FROM client WHERE licenseKey=:licenseKey");
		$stmt->execute(['licenseKey'=>$licenseKey]);
		return $stmt->fetch();
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

	// public function failedLogin(){
	// 	$stmt = self::$connection->prepare("UPDATE user SET failed_login_attempts = failed_login_attempts + 1 WHERE user_id = :user_id");
	// 	$stmt->execute(['user_id'=>$this->user_id]);
	// }

	// public function successLogin(){
	// 	$stmt = self::$connection->prepare("UPDATE user SET failed_login_attempts = 0, last_login_timestamp = UTC_TIMESTAMP() WHERE user_id = :user_id");
	// 	$stmt->execute(['user_id'=>$this->user_id]);
	// }
}