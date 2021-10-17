<?php
namespace App\models;

class Reservation extends \App\core\Model{

	public function __construct(){
		parent::__construct();
	}

	public function find($resv_id){
		$stmt = self::$connection->prepare("SELECT * FROM reservation WHERE resv_id = :resv_id");
		$stmt->execute(['resv_id'=>$resv_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Reservation");
		return $stmt->fetch();
	}

	public function selectAllReservedBooksByUser($user_id){
		$stmt = self::$connection->prepare("SELECT * FROM reservation INNER JOIN book ON reservation.book_id=book.book_id WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Reservation");
		return $stmt->fetchAll();
	}

	public function selectAll(){
		$stmt = self::$connection->prepare("SELECT * FROM reservation INNER JOIN book ON reservation.book_id=book.book_id INNER JOIN user ON reservation.user_id=user.user_id");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Reservation");
		return $stmt->fetchAll();
	}

	public function selectAllReservedBooksByBookID($book_id){
		$stmt = self::$connection->prepare("SELECT * FROM reservation WHERE book_id=:book_id");
		$stmt->execute(['book_id'=>$book_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Reservation");
		return $stmt->fetchAll();
	}

	public function insert(){
		// if($this->isValid()){
			$stmt = self::$connection->prepare("INSERT INTO reservation(user_id, book_id) 
            VALUES (:user_id, :book_id)");
			return $stmt->execute(['user_id'=>$this->user_id, 'book_id'=>$this->book_id]);		
		// }else
		// 	return false;
	}

    public function delete() {
		$stmt = self::$connection->prepare("DELETE from reservation WHERE resv_id=:resv_id");
		$stmt->execute(['resv_id'=>$this->resv_id]);
	}

	public function deleteRelatedToUser($user_id){
		$stmt = self::$connection->prepare("DELETE FROM reservation WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user_id]);
	}

	public function deleteRelatedToBook($book_id){
		$stmt = self::$connection->prepare("DELETE FROM reservation WHERE book_id=:book_id");
		$stmt->execute(['book_id'=>$book_id]);
	}
}