<?php
namespace App\models;

class Cart extends \App\core\Model {
	public $password_hash;
	public $email;

	public function getItemFromClientCart($token) {
		$ch = curl_init('http://localhost/cart-shop/api/item?key=' . $token);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;
	}

	public function insert($token, $item_id, $amount, $status, $client_id) {
		$ch = curl_init('http://localhost/cart-shop/api/cart?key=' . $token);
		$payload = json_encode(array('item_id' => $item_id, 
									'amount' => $amount,
									'status' => $status,
									'client_id' => $client_id
								));

		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);

		if ($response['status'] == "201") {
			return true;
		} else {
			return false;
		}
	}

	public function updateStatus($token, $status, $item_id) {
		$ch = curl_init('http://localhost/cart-shop/api/cart/0?key=' . $token);
		$payload = json_encode(array('item_id' => $item_id, 
									'status' => $status
								));

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);

		if ($response['status'] == "200") {
			return true;
		} else {
			return false;
		}
	}

	public function updateAmount($token, $amount, $item_id) {
		$ch = curl_init('http://localhost/cart-shop/api/cart/0?key=' . $token);
		$payload = json_encode(array('item_id' => $item_id, 
									'amount' => $amount
								));

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);

		if ($response['status'] == "200") {
			return true;
		} else {
			return false;
		}
	}

	public function delete($token, $item_id) {
		$ch = curl_init('http://localhost/cart-shop/api/cart/' . $item_id . '?key=' . $token);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json', 'Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response, true);

		if ($response['status'] == "200") {
			return true;
		} else {
			return false;
		}
	}

?>