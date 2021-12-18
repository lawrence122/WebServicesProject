<?php
namespace App\models;

class User extends \App\core\Model {
	public $password_hash;
	public $email;

	// public function isValid() {
	// 	return !empty($this->username) && !password_verify('', $this->password_hash);
	// }

	// public function find($user_id) {
	// 	$stmt = self::$connection->prepare("SELECT * FROM user WHERE user_id = :user_id");
	// 	$stmt->execute(['user_id'=>$user_id]);
	// 	$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
	// 	return $stmt->fetch();
	// }

	public function insert() {
		$ch = curl_init('http://localhost/cart-shop/api/user');
	    $payload = json_encode(array('email' => $this->email, 'password' => $this->password));

	    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    $response = curl_exec($ch);
	    curl_close($ch);
	    $response = json_decode($response, true);

	    if ($response['status'] == '200') {
	        return $response['token'];
	    } else {
	    	return false;
	    }
	}

	public function updateEmail($token, $new_email) {
		$ch = curl_init('http://localhost/cart-shop/api/user?key=' . $token);
	    $payload = json_encode(array('new_email' => $new_email, 'old_email' => $this->email, 'password' => $this->password));

	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    $response = curl_exec($ch);
	    curl_close($ch);
	    $response = json_decode($response, true);

	    if ($response['status'] == '200') {
	        echo "Email Updated";
	    }
	}

	public function updatePassword($token, $new_password) {
		$ch = curl_init('http://localhost/cart-shop/api/user?key=' . $token);
	    $payload = json_encode(array('email' => $this->email, 'new_password' => $new_password, 'old_password' => $this->password));

	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    $response = curl_exec($ch);
	    curl_close($ch);
	    $response = json_decode($response, true);

	    if ($response['status'] == '200') {
	        echo "Password Updated";
	    }
	}

	public function deleteUser($token) {
		$ch = curl_init('http://localhost/cart-shop/api/user?key=' . $token);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);
		
		if ($response['status'] == '200') {
			echo "Password Updated";
		}
	}

?>