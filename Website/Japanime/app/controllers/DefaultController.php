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
				header('location:'.BASE.'/Default/register?error=Registration Error');
			} else {
				$this->view('Default/home');
			}
		} else {
			$this->view('Login/Register');
		}
	}

}
?>