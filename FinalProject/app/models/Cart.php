<?php
namespace App\models;

class Cart extends \App\core\Model{

	public function __construct(){
		parent::__construct();
	}

	public function find($cart_id){
		$stmt = self::$connection->prepare("SELECT * FROM cart WHERE cart_id = :cart_id");
		$stmt->execute(['cart_id'=>$cart_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Cart");
		return $stmt->fetch();
	}

	public function selectAllCartItems($user_id){
		$stmt = self::$connection->prepare("SELECT * FROM cart INNER JOIN book ON cart.book_id=book.book_id WHERE user_id=:user_id AND shipping_address=:shipping_address");
		$stmt->execute(['user_id'=>$user_id, 'shipping_address'=>'']);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Cart");
		return $stmt->fetchAll();
	}

	public function cartBookPrices($user_id){
		$stmt = self::$connection->prepare("SELECT book.price FROM cart INNER JOIN book ON cart.book_id=book.book_id WHERE cart.user_id=:user_id AND cart.shipping_address=:shipping_address");
		$stmt->execute(['user_id'=>$user_id, 'shipping_address'=>'']);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Cart");
		return $stmt->fetchAll();
	}
	
	public function checkout(){
		$stmt = self::$connection->prepare("UPDATE cart SET payment_method=:payment_method, shipping_address=:shipping_address WHERE cart_id=:cart_id");
		$stmt->execute(['payment_method'=>$this->payment_method, 'shipping_address'=>$this->shipping_address, 'cart_id'=>$this->cart_id]);
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO cart(user_id, book_id) VALUES (:user_id, :book_id)");
		return $stmt->execute(['user_id'=>$this->user_id, 'book_id'=>$this->book_id]);	
	}

    public function delete() {
		$stmt = self::$connection->prepare("DELETE from cart WHERE cart_id=:cart_id");
		$stmt->execute(['cart_id'=>$this->cart_id]);
	}

	public function deleteRelatedToUser($user_id){
		$stmt = self::$connection->prepare("DELETE FROM cart WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user_id]);
	}

	public function deleteRelatedToBook($book_id){
		$stmt = self::$connection->prepare("DELETE FROM cart WHERE book_id=:book_id");
		$stmt->execute(['book_id'=>$book_id]);
	}
}