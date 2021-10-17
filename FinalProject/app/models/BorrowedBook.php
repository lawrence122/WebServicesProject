<?php
namespace App\models;

class BorrowedBook extends \App\core\Model{

	public function __construct(){
		parent::__construct();
	}

	public function find($borrowed_id){
		$stmt = self::$connection->prepare("SELECT * FROM borrowed WHERE borrowed_id = :borrowed_id");
		$stmt->execute(['borrowed_id'=>$borrowed_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\BorrowedBook");
		return $stmt->fetch();
	}

	public function searchUser($keyword) {
		$stmt = self::$connection->query("SELECT b.* FROM borrowed b, user u WHERE u.username LIKE '%$keyword%' AND b.user_id = u.user_id");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\BorrowedBook");
		return $stmt->fetchAll();
	}

	public function selectAllBorrowedBooksByUser($user_id){
		$stmt = self::$connection->prepare("SELECT * FROM borrowed INNER JOIN book ON borrowed.book_id=book.book_id WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\BorrowedBook");
		return $stmt->fetchAll();
	}

	public function selectAllBorrowedBooks(){
		$stmt = self::$connection->prepare("SELECT * FROM borrowed");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\BorrowedBook");
		return $stmt->fetchAll();
	}

	public function insert(){
		$stmt = self::$connection->prepare("INSERT INTO borrowed(user_id, book_id) VALUES (:user_id, :book_id)");
		return $stmt->execute(['user_id'=>$this->user_id, 'book_id'=>$this->book_id]);
	}

    public function delete() {
		$stmt = self::$connection->prepare("DELETE from borrowed WHERE borrowed_id=:borrowed_id");
		$stmt->execute(['borrowed_id'=>$this->borrowed_id]);
	}

	public function deleteRelatedToUser($user_id){
		$stmt = self::$connection->prepare("DELETE FROM borrowed WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user_id]);
	}

	public function deleteRelatedToBook($book_id){
		$stmt = self::$connection->prepare("DELETE FROM borrowed WHERE book_id=:book_id");
		$stmt->execute(['book_id'=>$book_id]);
	}

	public function updateReturnDate(){
		$stmt = self::$connection->prepare("UPDATE borrowed SET return_date=TIMESTAMPADD(DAY,7,:return_date) WHERE borrowed_id = :borrowed_id");
		$stmt->execute(['return_date'=>$this->return_date, 'borrowed_id'=>$this->borrowed_id]);
	}

}