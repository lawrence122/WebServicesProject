<?php
namespace App\controllers;

class UserController extends \App\core\Controller {

	function index() {
		$this->view('Default/editUser');
	}

	function edit($user_id) {
		$user = new \App\models\User();
		$user = $user->find($_SESSION['user_id']);

		if (isset($_POST["action"])) {
			$user->full_name = $_POST["full_name"];
			$user->email = $_POST["email"];
			$user->update();
			header("location:".BASE."/Default/home");
		} else {
			$this->view('Default/editAccount', $user);
		}
	}

	function changePassword($user_id) {
		$user = new \App\models\User();
		$user = $user->find($_SESSION['user_id']);

		if (isset($_POST['action'])) {
			if ($_POST['password'] == $_POST['password_confirm']) {
	            $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
	            $user->updatePassword();
	            header('location:'.BASE.'/Default/home');
			}
        } else {
            $this->view('Default/changePassword', $user);
        }
	}

	function viewOrders($user_id) {
		$user = new \App\models\User();
		$user = $user->find($_SESSION['user_id']);

		$order = new \App\models\UserOrder();
		$orders = $order->getAllOrders($user->user_id);

        $this->view('Default/viewOrders', $orders);
	}

	function delete($user_id){
        $order = new \App\models\UserOrder();
        $orderDetails = new \App\models\OrderDetails();
        $user = new \App\models\User();
        

        $orderAccount = $order->findUser($user_id);
        $orderDetailsAccount = $orderDetails->getAllProductId($user_id);
        $userAccount = $user->find($user_id);


        if ($orderDetailsAccount != false) {
            $orderDetails->user_id = $user_id;
            $orderDetails->deleteAll();
        }

        if ($orderAccount != false) {
            $order->user_id = $user_id;
            $order->deleteAccount();
        }
        
        $user->user_id = $user_id;
        $user->delete();
        header('location:'.BASE.'/');
    }
}
?>