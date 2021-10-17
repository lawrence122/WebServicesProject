<?php
namespace App\models;

class Book extends \App\core\Model{

	public function __construct(){
		parent::__construct();
	}

	public function find($book_id){
		$stmt = self::$connection->prepare("SELECT * FROM book WHERE book_id = :book_id");
		$stmt->execute(['book_id'=>$book_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Book");
		return $stmt->fetch();
	}

	public function isStocked($book_id){
		$book = new \App\models\Book();
		$book = $book->find($book_id);
		if($book->amount > 0){
			return true;
		}else{
			return false;
		}
	}

    public function selectAllBooks(){
		$stmt = self::$connection->prepare("SELECT * FROM book");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Book");
		return $stmt->fetchAll();
	}

	public function searchBook($keyword) {
		$stmt = self::$connection->query("SELECT * FROM book WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%' OR book_desc LIKE '%$keyword%'");
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Book");
		return $stmt->fetchAll();
	}

	public function insert(){
		// $imageUrl;
		if(!empty($this->imageUrl)){
			$stmt = self::$connection->prepare("INSERT INTO book(imageUrl, title, author, book_desc, price, amount) 
        										VALUES (:imageUrl, :title, :author, :book_desc, :price, :amount)");
			return $stmt->execute(['imageUrl'=>$this->imageUrl, 'title'=>$this->title, 'author'=>$this->author, 
									'book_desc'=>$this->book_desc, 'price'=>$this->price, 'amount'=>$this->amount]);	
		} else {
			$stmt = self::$connection->prepare("INSERT INTO book(title, author, book_desc, price, amount) 
        										VALUES (:title, :author, :book_desc, :price, :amount)");
			return $stmt->execute(['title'=>$this->title, 'author'=>$this->author, 
									'book_desc'=>$this->book_desc, 'price'=>$this->price, 'amount'=>$this->amount]);
		}		

	}

	public function update(){
		$stmt = self::$connection->prepare("UPDATE book SET title=:title, author=:author, book_desc=:book_desc, price=:price, amount=:amount WHERE book_id = :book_id");
		$stmt->execute(['title'=>$this->title, 'author'=>$this->author, 'book_desc'=>$this->book_desc, 'price'=>$this->price, 'amount'=>$this->amount,'book_id'=>$this->book_id]);
	}

	public function removeFromAmount(){
		$stmt = self::$connection->prepare("UPDATE book SET amount=:amount WHERE book_id = :book_id");
		$stmt->execute(['amount'=>$this->amount-1,'book_id'=>$this->book_id]);
	}
	public function addToAmount(){
		$stmt = self::$connection->prepare("UPDATE book SET amount=:amount WHERE book_id = :book_id");
		$stmt->execute(['amount'=>$this->amount+1,'book_id'=>$this->book_id]);
	}

    public function delete() {
		$stmt = self::$connection->prepare("DELETE from book WHERE book_id = :book_id");
		$stmt->execute(['book_id'=>$this->book_id]);
	}
	
}