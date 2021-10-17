<?php
namespace App\controllers;

class CartController extends \App\core\Controller{
	#[\App\core\LoginFilter]
	#[\App\core\UserFilter]
	function index(){
		$item = new \App\models\Cart();
		$items = $item->selectAllCartItems($_SESSION['user_id']);
		
        $this->view('User/myCart', $items);
	}

	#[\App\core\UserFilter]
	function add($book_id) {
		// Check amount
		$book = new \App\models\Book();
		$book = $book->find($book_id);
		$amount = $book->amount;

		if ($amount != 0) {
			$item = new \App\models\Cart();
			$item->user_id = $_SESSION["user_id"];
			$item->book_id = $book_id;
			$item->insert();
			header("location:".BASE."/Book/userCatalog?message=Added to cart");
		} else {
			header("location:".BASE."/Book/userCatalog?error=Could not add book to cart");
		}
	}

	#[\App\core\UserFilter]
	function processPurchase(){
		$cart = new \App\models\Cart();
		$bookPrices = $cart->cartBookPrices($_SESSION['user_id']);
		$cart = $cart->selectAllCartItems($_SESSION['user_id']);
		$price = 0;
		foreach($bookPrices as $bookPrice){
			$price += $bookPrice->price;
		}

		if(isset($_POST["action"])){
			$user = new \App\models\User();
			$user = $user->findWithUserID($_SESSION['user_id']);
			
			if($_POST['username'] == $user->username){
				if ($user->balance >= $price) {
					$payment_method = $_POST['payment_method'];
					$shipping_address = $_POST['shipping_address'];
					foreach($cart as $item){
						$item->payment_method = $payment_method;
						$item->shipping_address = $shipping_address;
						$item->checkout();

						$book = new \App\models\Book();
						$book = $book->find($item->book_id);

						$history = new \App\models\History();
						$history->user_id = $_SESSION['user_id'];
						$history->book_id = $book->book_id;
						$history->type = 'bought';
						$history->insert();

						$book->removeFromAmount();
					}
					$user = new \App\models\User();
					$user = $user->findWithUserID($_SESSION['user_id']);
			
					$user->reduceBalance($price);
					header("location:".BASE."/User/homepage?message=Checkout Successful");
				} else{
					header("location:".BASE."/User/homepage?error=Checkout Unsuccessful. You do not have enough funds");
				}
			}else{
				header("location:".BASE."/Cart/processPurchase?error=Wrong Username");
			}
		}else{
			$this->view('User/checkout', ['cart'=>$cart, 'price'=>$price]);
		}
	}

	#[\App\core\UserFilter]
	function buy($book_id){
        //TO CHANGE
		$book = new \App\models\Book();
		$book = $book->find($book_id);
		if(isset($_POST["action"])){
			$book->title = $_POST["title"];
			$book->author = $_POST["author"];
			$book->book_desc = $_POST["book_desc"];
			$book->price = $_POST["price"];
			$book->update();

            //TO CHANGE
			header("location:".BASE."/Book/index");
		}else{
            //TO CHANGE
			$this->view('Book/editBook',$book);
		}
	}

	#[\App\core\UserFilter]
	function delete($cart_id){
		$item = new \App\models\Cart();
		$item = $item->find($cart_id);
		$item->delete();
		header("location:".BASE."/Cart/index?message=Book removed from cart");
	}

}
?>