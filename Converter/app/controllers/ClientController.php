<?php
namespace App\controllers;

// use App\core\App;

class ClientController extends \App\core\Controller{
	function getAll() {
		$clients = new \App\models\Client();
		return $clients->getAllClients();
	}

	function insert() {
		$client = new \App\models\Client();
		return $client->insert();
	}

	function getClientID($licenseKey) {
		$client = new \App\models\Client();
		$client = $client->getClientID($licenseKey);
		if (empty($client)) {
			return false;
		} else {
			return $client['clientID'];
		}
	}

	function getClient($licenseNumber) {
		$client = new \App\models\Client();
		$client = $client->getClient($licenseNumber);
		if (empty($client)) {
			return null;
		} else {
			return $client;
		}
	}

	function UpdateKey($licenseNumber, $licenseKey, $licenseStartDate, $licenseEndDate) {
		$client = new \App\models\Client();
		$client->licenseNumber = $licenseNumber;
		$client->licenseKey = $licenseKey;
		$client->licenseStartDate = $licenseStartDate;
		$client->licenseEndDate = $licenseEndDate;
		$client->updateKey();
	}

	// function register(){
	// 	if(isset($_POST['action'])){
	// 		$user = new \App\models\User();
	// 		$user = $user->find($_POST['username']);
	// 		if ($user == null) {
	// 			if($_POST['password'] == $_POST['password_confirm']){
	// 				$user = new \App\models\User();
	// 				$user->username = $_POST['username'];
	// 				$user->password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
	// 				if($user->insert()){
	// 					//CHANGE REDIRECTION
	// 					header('location:'.BASE.'/User/homepage');
	// 				}else{
	// 					header('location:'.BASE.'/Account/register?error=The user was not registered!');//reload
	// 				}
				
	// 			}else
	// 				header('location:'.BASE.'/Account/register?error=Passwords do not match!');//reload
	// 		}else 
	// 			header('location:'.BASE.'/Account/register?error=Username is Taken!');//reload
	// 	}else{
	// 		$this->view('Account/register');
	// 	}
	// }

	// function validateLogin(){
	// 	if(isset($_POST['action'])){
	// 		$currentCode = $_POST['currentCode'];
	// 		$user = new \App\models\User();
	// 		$user->user_id = $_SESSION['temp_user_id'];
	// 		if(\App\core\TokenAuth::verify($_SESSION['token'],$currentCode)){
	// 			$_SESSION['user_id'] = $_SESSION['temp_user_id'];
	// 			$_SESSION['username'] = $_SESSION['temp_username'];
	// 			$_SESSION['token'] = '';
	// 			// $user->successLogin();
	// 			header('location:'.BASE.'/User/homepage');
	// 		}else{
				
	// 			// $user->failedLogin();
	// 			session_destroy();
	// 			header('location:'.BASE.'/User/login?error=Username/password mismatch!');
	// 		}
	// 	}else{
	// 		$this->view('User/validateLogin');
	// 	}
	// }
}
?>