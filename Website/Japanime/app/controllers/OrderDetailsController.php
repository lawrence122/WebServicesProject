<?php
namespace App\controllers;

class OrderDetailsController extends \App\core\Controller {

	function index() {
		$order_detail = new \App\models\OrderDetails();
		$order_details_ids = $order_detail->getAllProductId($_SESSION['user_id']);
		$order_detail_qty = $order_detail->getAllQuantities($_SESSION['user_id']);

		$product = new \App\models\Product();
		$order_id = $order_detail->getOrderId($_SESSION['user_id']);

		$product_array = array();
		$quantity_array = array();
		$price_array = array();

		foreach ($order_details_ids as $product_id) {
			$products = $product->find($product_id->product_id);
			array_push($product_array, $products);
		}

		foreach ($order_detail_qty as $product_quantity) {
			$quantities = $order_detail->findQty($product_quantity->user_id, $product_quantity->product_id);
			array_push($quantity_array, $quantities);
		}

		foreach ($order_detail_qty as $product_price) {
			$prices = $order_detail->totalPrice($product_price->user_id, $product_price->product_id);
			array_push($price_array, $prices);
		}

		if ($order_id != null) {
			$this->view('Cart/cart', ['products'=>$product_array, 'quantities'=>$quantity_array, 'prices'=>$price_array, 'order_id'=>$order_id->order_id]);
		} else {
			$this->view('Cart/cart', ['products'=>$product_array, 'quantities'=>$quantity_array, 'prices'=>$price_array, 'order_id'=>null]);
		}

	}

	function add($product_id) {
		$user = new \App\models\User();
        $user = $user->find($_SESSION['user_id']);

        $product = new \App\models\Product();
		$product = $product->find($product_id);

		if ($user_found == false) {
			$user_order->newOrder();
			$user_found = $user_order->findUser($user->user_id);
		}

		$order_details = new \App\models\OrderDetails();
		$order_details->user_id = $user->user_id;

		$order_details->order_id = $user_found->order_id;
		$order_details->product_id = $product_id;
		$order_details->product_name = $product->product_name;
		$order_details->product_price = $product->price;
		$order_details->product_quantity = 1;
		$order_details->insert();
		header("location:".BASE."/OrderDetails/index");
	}

	function addQty($product_id) {
		$user = new \App\models\User();
        $user = $user->find($_SESSION['user_id']);

		$order_detail = new \App\models\OrderDetails();
		$order_detail = $order_detail->findProduct($product_id, $user->user_id);

		$order_detail->user_id = $user->user_id;
		$order_detail->addQuantity();
		header("location:".BASE."/OrderDetails/index");
	}

	function removeQty($product_id) {
		$user = new \App\models\User();
        $user = $user->find($_SESSION['user_id']);

		$order_detail = new \App\models\OrderDetails();
		$order_detail = $order_detail->findProduct($product_id, $user->user_id);

		$order_detail->user_id = $user->user_id;
		$order_detail->removeQuantity();

		if ($order_detail->product_quantity < 2) {
			header("location:".BASE."/OrderDetails/delete/$order_detail->product_id");
		} else {
			header("location:".BASE."/OrderDetails/index");
		}
	}

	function delete($product_id) {
		$order_detail = new \App\models\OrderDetails();
		$order_detail->user_id = $_SESSION['user_id'];
		$order_detail->product_id = $product_id;
		$order_detail->delete();
		header("location:".BASE."/OrderDetails/index");
	}

}
?>