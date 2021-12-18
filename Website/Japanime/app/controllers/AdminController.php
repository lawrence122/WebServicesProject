<?php
namespace App\controllers;

class AdminController extends \App\core\Controller {

	function index() {
		$this->view('Admin/home');
	}

	function viewProduct() {
		$this->view('Admin/productList');
	}

	function viewAnime() {
		$product = new \App\models\Product();
		$products = $product->getAllAnime();
		$this->view('Admin/animeDVD', $products);
	}

	function viewManga() {
		$product = new \App\models\Product();
		$products = $product->getAllManga();
		$this->view('Admin/manga', $products);
	}

	function viewFigure() {
		$product = new \App\models\Product();
		$products = $product->getAllFigure();
		$this->view('Admin/figures', $products);
	}
}
?>