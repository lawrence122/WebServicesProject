<?php
namespace App\controllers;

class DefaultController extends \App\core\Controller {

	function index() {
		header('location:'.BASE.'/Default/register');
	}

	function register() {
		if (isset($_POST['action'])) {
			$user = new \App\models\User();
			$user->password = $_POST['password'];
			$user->email = $_POST['email'];

			$user = $user->insert();

			if (!$user) {
				header('location:'.BASE.'/DefaultController/register?error=Registration Error');
			} else {
				$_SESSION['token'] = $user;
				$this->view('Default/home'); //TO CHANGE
			}
		} else {
			$this->view('Login/register'); //TO CHANGE
		}
	}

}
?>