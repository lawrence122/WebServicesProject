<?php
namespace App\models;

class OrderDetails extends \App\core\Model {
	public $order_detail_id;
	public $order_id;
	public $product_id;
	public $user_id;
	public $product_name;
	public $product_price;
	public $product_quantity;


	public function __construct() {
		parent::__construct();
	}

	public function find($order_detail_id) {
		$stmt = self::$connection->prepare("SELECT * FROM order_detail WHERE order_detail_id = :order_detail_id");
		$stmt->execute(['order_detail_id'=>$order_detail_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\OrderDetails");
		return $stmt->fetch();
	}

	public function findProduct($product_id, $user_id) {
		$stmt = self::$connection->prepare("SELECT * FROM order_detail WHERE product_id = :product_id AND user_id = :user_id");
		$stmt->execute(['product_id'=>$product_id, 'user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\OrderDetails");
		return $stmt->fetch();
	}

	public function getAllProductId($user_id) {
		$stmt = self::$connection->prepare("SELECT * FROM order_detail WHERE user_id = :user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\OrderDetails");
		return $stmt->fetchAll();
	}

	public function getOrderId($user_id) {
		$stmt = self::$connection->prepare("SELECT * FROM order_detail WHERE user_id = :user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\OrderDetails");
		return $stmt->fetch();
	}

	public function getAllQuantities($user_id) {
		$stmt = self::$connection->prepare("SELECT * FROM order_detail WHERE user_id = :user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\OrderDetails");
		return $stmt->fetchAll();
	}

	public function findUser($user_id) {
		$stmt = self::$connection->prepare("SELECT * FROM order_detail WHERE user_id = :user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\OrderDetails");
		return $stmt->fetch();
	}

	public function findQty($user_id, $product_id) {
		$stmt = self::$connection->prepare("SELECT product_quantity FROM order_detail WHERE product_id = :product_id AND user_id = :user_id");
		$stmt->execute(['user_id'=>$user_id, 'product_id'=>$product_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\OrderDetails");
		return $stmt->fetch();
	}

	public function insert() {
		$stmt = self::$connection->prepare("INSERT INTO order_detail(order_detail_id, order_id, product_id, user_id, product_name, product_price, product_quantity) VALUES (:order_detail_id, :order_id, :product_id, :user_id, :product_name, :product_price, :product_quantity)");
		return $stmt->execute(['order_detail_id'=>$this->order_detail_id, 'order_id'=>$this->order_id, 'product_id'=>$this->product_id, 'user_id'=>$this->user_id, 'product_name'=>$this->product_name, 'product_price'=>$this->product_price, 'product_quantity'=>$this->product_quantity]);
	}

	public function totalPrice($user_id, $product_id) {
		$stmt = self::$connection->prepare("SELECT (product_price * product_quantity) AS total_item_price FROM order_detail WHERE user_id = :user_id AND product_id = :product_id");
        $stmt->execute(['user_id'=>$user_id, 'product_id'=>$product_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\OrderDetails");
		return $stmt->fetch();
	}

	public function addQuantity() {
		$stmt = self::$connection->prepare("UPDATE order_detail SET product_quantity = :product_quantity + 1 WHERE product_id = :product_id AND user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id, 'product_quantity'=>$this->product_quantity, 'product_id'=>$this->product_id]);
	}

	public function removeQuantity() {
		$stmt = self::$connection->prepare("UPDATE order_detail SET product_quantity = :product_quantity - 1 WHERE product_id = :product_id AND user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id, 'product_quantity'=>$this->product_quantity, 'product_id'=>$this->product_id]);
	}

	public function delete() {
		$stmt = self::$connection->prepare("DELETE FROM order_detail WHERE product_id = :product_id AND user_id = :user_id");
		$stmt->execute(['product_id'=>$this->product_id, 'user_id'=>$this->user_id]);
	}

	public function deleteAll() {
		$stmt = self::$connection->prepare("DELETE FROM order_detail WHERE user_id = :user_id");
		$stmt->execute(['user_id'=>$this->user_id]);
	}
}