<?php
namespace App\models;

class History extends \App\core\Model{

	public function __construct(){
		parent::__construct();
	}

	public function seeAllHistory(){
		$stmt = self::$connection->prepare("SELECT * FROM history");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\History");
		return $stmt->fetchAll();
	}

    public function selectAllBooksByUser($user_id){
		$stmt = self::$connection->prepare("SELECT * FROM history INNER JOIN book ON history.book_id=book.book_id WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\History");
		return $stmt->fetchAll();
	}

	public function insert(){
		// if($this->isValid()){
			$stmt = self::$connection->prepare("INSERT INTO history(user_id, book_id, type) VALUES (:user_id, :book_id, :type)");
			return $stmt->execute(['user_id'=>$this->user_id, 'book_id'=>$this->book_id, 'type'=>$this->type]);		
		// }else
		// 	return false;
	}

	public function deleteRelatedToUser($user_id){
		$stmt = self::$connection->prepare("DELETE FROM history WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user_id]);
	}

	public function deleteRelatedToBook($book_id){
		$stmt = self::$connection->prepare("DELETE FROM history WHERE book_id=:book_id");
		$stmt->execute(['book_id'=>$book_id]);
	}
}