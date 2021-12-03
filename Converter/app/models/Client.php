<?php
namespace App\models;

class Client extends \App\core\Model{

	public function __construct(){
		parent::__construct();
	}

	// public function isValid(){
	// 	return !empty($this->username) && !password_verify('', $this->password_hash);
	// }

	public function getAllClients(){
		$stmt = self::$connection->prepare("SELECT * FROM client");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Client");
		return $stmt->fetchAll();
	}

	function getClientID($licenseKey) {
		$stmt = self::$connection->prepare("SELECT clientID FROM client WHERE licenseKey=:licenseKey");
		$stmt->execute(['licenseKey'=>$licenseKey]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Client");
		return $stmt->fetch();
	}

	public function getClient($licenseNumber) {
		$stmt = self::$connection->prepare("SELECT * FROM client WHERE licenseNumber = :licenseNumber");
		$stmt->execute(['licenseNumber'=>$licenseNumber]);$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Client");
		return $stmt->fetch();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO client(clientName, licenseNumber, 
											licenseStartDate, licenseEndDate, licenseKey) 
											VALUES (:clientName, :licenseNumber, 
											:licenseStartDate, :licenseEndDate, :licenseKey)");

		return $stmt->execute(['clientName'=>$this->clientName, 
								'licenseNumber'=>$this->licenseNumber, 
								'licenseStartDate'=>$this->licenseStartDate, 
								'licenseEndDate'=>$this->licenseEndDate, 
								'licenseKey'=>$this->licenseKey]);
	}

	public function updateKey() {
		$stmt = self::$connection->prepare("UPDATE client SET licenseStartDate=:licenseStartDate, 
										licenseEndDate=:licenseEndDate, licenseKey=:licenseKey 
										WHERE licenseNumber=:licenseNumber");
		$stmt->execute(['licenseNumber' => $this->licenseNumber, 
						'licenseKey' => $this->licenseKey,
						'licenseStartDate' => $this->licenseStartDate, 
						'licenseEndDate' => $this->licenseEndDate]);
	}

	// public function failedLogin(){
	// 	$stmt = self::$connection->prepare("UPDATE user SET failed_login_attempts = failed_login_attempts + 1 WHERE user_id = :user_id");
	// 	$stmt->execute(['user_id'=>$this->user_id]);
	// }

	// public function successLogin(){
	// 	$stmt = self::$connection->prepare("UPDATE user SET failed_login_attempts = 0, last_login_timestamp = UTC_TIMESTAMP() WHERE user_id = :user_id");
	// 	$stmt->execute(['user_id'=>$this->user_id]);
	// }
	
	// public function updatePassword(){
	// 	$stmt = self::$connection->prepare("UPDATE user SET password_hash=:password_hash WHERE user_id = :user_id");
	// 	$stmt->execute(['password_hash'=>$this->password_hash,'user_id'=>$this->user_id]);
	// }
}