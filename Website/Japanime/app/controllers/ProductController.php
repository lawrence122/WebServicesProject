<?php
namespace App\controllers;

class ProductController extends \App\core\Controller {

	function index() {
		$this->view('Product/productList');
	}

	function viewAnime() {
		if (isset($_POST["action"])) {
            $product = new \App\models\Product();
            if (isset($_POST['slct'])) {
                $option = $_POST['slct'];
                if ($option == 1) {
                    $products = $product->getAllAnimeNameASC();
                    $this->view('Product/animeDVD', $products);
                } elseif ($option == 2) {
                    $products = $product->getAllAnimeNameDESC();
                    $this->view('Product/animeDVD', $products);
                } elseif ($option == 3) {
                    $products = $product->getAllAnimePriceASC();
                    $this->view('Product/animeDVD', $products);
                } else {
                    $products = $product->getAllAnimePriceDESC();
                    $this->view('Product/animeDVD', $products);
                }
            } 
            else {
                header("location:".BASE."/Product/viewAnime");
            }
        } else {
            $product = new \App\models\Product();
			$products = $product->getAllAnime();
			$this->view('Product/animeDVD', $products);
        }
	}

	function viewManga() {
		if (isset($_POST["action"])) {
            $product = new \App\models\Product();
            if (isset($_POST['slct'])) {
                $option = $_POST['slct'];
                if ($option == 1) {
                    $products = $product->getAllMangaNameASC();
                    $this->view('Product/manga', $products);
                } elseif ($option == 2) {
                    $products = $product->getAllMangaNameDESC();
                    $this->view('Product/manga', $products);
                } elseif ($option == 3) {
                    $products = $product->getAllMangaPriceASC();
                    $this->view('Product/manga', $products);
                } else {
                    $products = $product->getAllMangaPriceDESC();
                    $this->view('Product/manga', $products);
                }
            } 
            else {
                header("location:".BASE."/Product/viewManga");
            }
        } else {
            $product = new \App\models\Product();
			$products = $product->getAllManga();
			$this->view('Product/manga', $products);
        }
	}

	function viewFigure() {
		if (isset($_POST["action"])) {
            $product = new \App\models\Product();
            if (isset($_POST['slct'])) {
                $option = $_POST['slct'];
                if ($option == 1) {
                    $products = $product->getAllFigureNameASC();
                    $this->view('Product/figures', $products);
                } elseif ($option == 2) {
                    $products = $product->getAllFigureNameDESC();
                    $this->view('Product/figures', $products);
                } elseif ($option == 3) {
                    $products = $product->getAllFigurePriceASC();
                    $this->view('Product/figures', $products);
                } else {
                    $products = $product->getAllFigurePriceDESC();
                    $this->view('Product/figures', $products);
                }
            } 
            else {
                header("location:".BASE."/Product/viewFigure");
            }
        } else {
            $product = new \App\models\Product();
			$products = $product->getAllFigure();
			$this->view('Product/figures', $products);
        }
	}

	function add() {
		if (isset($_POST['action'])) {
			if (isset($_FILES['myImage'])) {
				$check = getimagesize($_FILES['myImage']['tmp_name']);
				$allowedTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];

				if ($check !== false && in_array($check['mime'], $allowedTypes)) {
					$extension = ['image/gif'=>'gif', 'image/jpeg'=>'jpeg', 'image/png'=>'png', 'image/jpg'=>'jpg'];
					$extension = $extension[$check['mime']];
					$target_folder = 'uploads/';
					$targetFile = uniqid().".$extension";

					if (move_uploaded_file($_FILES['myImage']['tmp_name'], $target_folder.$targetFile)) {
						
						$product = new \App\models\Product();
						$product->product_name = $_POST['product_name'];
						$product->filename = $targetFile;
						$product->description = $_POST['description'];
						$product->price = $_POST['price'];
						$product->qoh = $_POST['quantity'];
						$product->stock_status = $_POST['stock_status'];
						$product->category = $_POST['category'];
						$product->insert();
						header('location:'.BASE.'/Admin/index');
					} else {
						echo 'error';
					}
				}
			}
		} else {
			$this->view('Admin/newProduct');
		}
	}

	function edit($product_id) {
		$product = new \App\models\Product();
		$product = $product->find($product_id);

		if (isset($_POST["action"])) {
			$product->product_name = $_POST['product_name'];
			$product->description = $_POST['description'];
			$product->price = $_POST['price'];
			$product->qoh = $_POST['quantity'];
			$product->stock_status = $_POST['stock_status'];
			$product->category = $_POST['category'];
			$product->update();
			header("location:".BASE."/Admin/index");
		} else {
			$this->view('Admin/editProduct', $product);
		}
	}

	function delete($product_id){
		$product = new \App\models\Product();
		$product = $product->find($product_id);
		$product->delete();
		header("location:".BASE."/Admin/index");
	}

}
?>