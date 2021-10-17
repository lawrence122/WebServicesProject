<?php
namespace App\models; 

class User extends \App\core\Model{

	public function __construct(){
		parent::__construct();
	}

	public function isValid(){
		return !empty($this->username) && !password_verify('', $this->password_hash);
	}

	public function searchUser($keyword) {
		$stmt = self::$connection->query("SELECT * FROM user WHERE username LIKE '%$keyword%'");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
		return $stmt->fetchAll();
	}

	public function getAllUsers(){
		$stmt = self::$connection->prepare("SELECT * FROM user ORDER BY username ASC");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
		return $stmt->fetchAll();
	}

	public function find($username){
		$stmt = self::$connection->prepare("SELECT * FROM user WHERE username = :username");
		$stmt->execute(['username'=>$username]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
		return $stmt->fetch();
	}

	public function findWithUserID($user_id){
		$stmt = self::$connection->prepare("SELECT * FROM user WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
		return $stmt->fetch();
	}

	public function insert(){
		if($this->isValid()){
			$stmt = self::$connection->prepare("INSERT INTO user(username, password_hash) 
			VALUES (:username, :password_hash)");

			return $stmt->execute(['username'=>$this->username, 'password_hash'=>$this->password_hash]);
		}else
			return false;
	}

	public function update2fa(){
		$stmt = self::$connection->prepare("UPDATE user SET token = :token WHERE user_id = :user_id");
		$stmt->execute(['token'=>$this->token,'user_id'=>$this->user_id]);
	}

	public function getProfilePic($user_id){
		$stmt = self::$connection->prepare("SELECT profile_picture FROM user WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
		return $stmt->fetch();
	}
	   
	   public function changeProfilePic(){
		$stmt = self::$connection->prepare("UPDATE user SET profile_picture=:profile_picture WHERE user_id=:user_id");
		$stmt->execute(['profile_picture'=>$this->profile_picture, 'user_id'=>$this->user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
		return $stmt->fetch();
	}

	// public function failedLogin(){
	// 	$stmt = self::$connection->prepare("UPDATE user SET failed_login_attempts = failed_login_attempts + 1 WHERE user_id = :user_id");
	// 	$stmt->execute(['user_id'=>$this->user_id]);
	// }

	// public function successLogin(){
	// 	$stmt = self::$connection->prepare("UPDATE user SET failed_login_attempts = 0, last_login_timestamp = UTC_TIMESTAMP() WHERE user_id = :user_id");
	// 	$stmt->execute(['user_id'=>$this->user_id]);
	// }
	
	public function updatePassword(){
		$stmt = self::$connection->prepare("UPDATE user SET password_hash=:password_hash WHERE user_id = :user_id");
		$stmt->execute(['password_hash'=>$this->password_hash,'user_id'=>$this->user_id]);
	}

	public function deleteUser($user_id){
		$stmt = self::$connection->prepare("DELETE FROM user WHERE user_id = :user_id");
		$stmt->execute(['user_id'=>$this->user_id]);
	}

}