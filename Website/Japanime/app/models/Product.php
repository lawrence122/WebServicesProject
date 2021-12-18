<?php
namespace App\models;

class Product extends \App\core\Model {
	public $product_id;
	public $product_name;
	public $filename;
	public $description;
	public $price;
	public $qoh;
	public $stock_status;
	public $category;

	public function __construct(){
		parent::__construct();
	}

	public function find($product_id) {
		$stmt = self::$connection->prepare("SELECT * FROM product WHERE product_id = :product_id");
		$stmt->execute(['product_id'=>$product_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetch();
	}

	//      -------------------- ANIME ----------------------------------------
	public function getAllAnime() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Anime DVD' ORDER BY product_name");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllAnimeNameASC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Anime DVD' ORDER BY product_name ASC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllAnimeNameDESC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Anime DVD' ORDER BY product_name DESC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllAnimePriceASC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Anime DVD' ORDER BY price ASC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllAnimePriceDESC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Anime DVD' ORDER BY price DESC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}
    
    //      -------------------- MANGA ----------------------------------------
	public function getAllManga() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Manga' ORDER BY product_name");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllMangaNameASC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Manga' ORDER BY product_name ASC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllMangaNameDESC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Manga' ORDER BY product_name DESC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllMangaPriceASC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Manga' ORDER BY price ASC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllMangaPriceDESC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Manga' ORDER BY price DESC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	//      -------------------- FIGURE ----------------------------------------
	public function getAllFigure() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Figure' ORDER BY product_name");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllFigureNameASC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Figure' ORDER BY product_name ASC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllFigureNameDESC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Figure' ORDER BY product_name DESC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	public function getAllFigurePriceASC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Figure' ORDER BY price ASC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}
	
	public function getAllFigurePriceDESC() {
		$stmt = self::$connection->query("SELECT * FROM product WHERE category = 'Figure' ORDER BY price DESC");
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Product");
		return $stmt->fetchAll();
	}

	//      ------------------------------------------------------------
	public function insert() {
		$stmt = self::$connection->prepare("INSERT INTO product (product_name, filename, description, price, qoh, stock_status, category) VALUES (:product_name, :filename, :description, :price, :qoh, :stock_status, :category)");
		$stmt->execute(['product_name'=>$this->product_name, 'filename'=>$this->filename, 'description'=>$this->description, 'price'=>$this->price, 'qoh'=>$this->qoh, 'stock_status'=>$this->stock_status, 'category'=>$this->category]);
	}

	public function update() {
		$stmt = self::$connection->prepare("UPDATE product SET product_name = :product_name, description = :description, price = :price, qoh = :qoh, stock_status = :stock_status, category = :category WHERE product_id = :product_id");
		$stmt->execute(['product_name'=>$this->product_name, 'description'=>$this->description, 'price'=>$this->price, 'qoh'=>$this->qoh, 'stock_status'=>$this->stock_status, 'category'=>$this->category, 'product_id'=>$this->product_id]);
	}

	public function delete() {
		$stmt = self::$connection->prepare("DELETE from order_detail WHERE product_id = :product_id");
		$stmt->execute(['product_id'=>$this->product_id]);

		$stmt = self::$connection->prepare("DELETE from product WHERE product_id = :product_id");
		$stmt->execute(['product_id'=>$this->product_id]);
	}

}