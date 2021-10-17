<?php
namespace App\controllers;

class UserController extends \App\core\Controller{
	#[\App\core\LoginFilter]
	function index(){
		$this->view('User/Homepage');
	}

	function profile(){
		$this->view('User/profile');
	}

	#[\App\core\LoginFilter]
	function twoFASetup(){
		if(isset($_POST['action'])){
			//if the passwords match
			$currentcode = $_POST['currentCode'];
			if(\App\core\TokenAuth::verify($_SESSION['token'],$currentcode)){
				//the user has verified their proper 2-factor authentication setup
				$user = new \App\models\User();
				$user->user_id = $_SESSION['user_id'];
				$user->token = $_SESSION['token'];
				$user->update2fa();
				header('location:'.BASE.'/User/login');
			}else
				header('location:'.BASE.'/User/librariantwofasetup?error=token not verified!');//reload
		}else{
			$token = \App\core\TokenAuth::generateRandomClue();
			$_SESSION['token'] = $token;
			$url = \App\core\TokenAuth::getLocalBarCodeUrl($_SESSION['username'],'thedomain.com',$token,'TheNameOfYourApplication');
			$this->view('Login/librariantwofasetup', $url);
		}	
	}

	function makeQRCode(){
		$data = $_GET['data'];
		\QRcode::png($data);
	}

	function login(){
		if(isset($_POST['action'])){
			$user = new \App\models\User();
			$user = $user->find($_POST['username']);
			//more than 3 login attempts
			// if( $user != null && $user->failed_login_attempts >= 3){
			// 	header('location:'.BASE.'/Default/login?error=Account locked!');//reload
			// }

			//if the password matches the password_hash
			// elseif( $user != null &&
			// 	password_verify($_POST['password'], $user->password_hash) ){
			if( $user != null &&
				password_verify($_POST['password'], $user->password_hash) ){
				//log in the user.....
				//remember that user is logged in....
				//two kinds of users: with or without 2-fa

				// $_SESSION['last_login_timestamp'] = $user->last_login_timestamp;
				if($user->token == null){
					$_SESSION['user_id'] = $user->user_id;
					$_SESSION['username'] = $user->username;
					// $user->successLogin();
					header('location:'.BASE.'/User/homepage');
				}else{
					$_SESSION['temp_user_id'] = $user->user_id;
					$_SESSION['temp_username'] = $user->username;
					$_SESSION['token'] = $user->token; 
					header('location:'.BASE.'/User/validateLogin');
				}
			}else{
				// $user->failedLogin();
				header('location:'.BASE.'/User/login?error=Username/password mismatch!');//reload
			}
		}else{
			$this->view('Account/login');
		}
	}

	function register(){
		if(isset($_POST['action'])){
			$user = new \App\models\User();
			$user = $user->find($_POST['username']);
			if ($user == null) {
				if($_POST['password'] == $_POST['password_confirm']){
					$user = new \App\models\User();
					$user->username = $_POST['username'];
					$user->password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
					if($user->insert()){
						//CHANGE REDIRECTION
						header('location:'.BASE.'/User/homepage');
					}else{
						header('location:'.BASE.'/Account/register?error=The user was not registered!');//reload
					}
				
				}else
					header('location:'.BASE.'/Account/register?error=Passwords do not match!');//reload
			}else 
				header('location:'.BASE.'/Account/register?error=Username is Taken!');//reload
		}else{
			$this->view('Account/register');
		}
	}

	function validateLogin(){
		if(isset($_POST['action'])){
			$currentCode = $_POST['currentCode'];
			$user = new \App\models\User();
			$user->user_id = $_SESSION['temp_user_id'];
			if(\App\core\TokenAuth::verify($_SESSION['token'],$currentCode)){
				$_SESSION['user_id'] = $_SESSION['temp_user_id'];
				$_SESSION['username'] = $_SESSION['temp_username'];
				$_SESSION['token'] = '';
				// $user->successLogin();
				header('location:'.BASE.'/User/homepage');
			}else{
				
				// $user->failedLogin();
				session_destroy();
				header('location:'.BASE.'/User/login?error=Username/password mismatch!');
			}
		}else{
			$this->view('User/validateLogin');
		}
	}

	function logout(){
		session_destroy();
		header('location:'.BASE.'/');
	}

	#[\App\core\LoginFilter]
	function changePassword(){
		if(isset($_POST['action'])){
			$user = new \App\models\User();
			$user = $user->find($_SESSION['username']);
			if( $user != null &&
				password_verify($_POST['password'], $user->password_hash) ){
				//change the password if the others match and are non-empty
				if(!empty($_POST['new_password']) && $_POST['new_password'] == $_POST['new_password_confirm']){
					$user->password_hash = password_hash($_POST['new_password'],PASSWORD_DEFAULT);
					$user->updatePassword();
					header('location:'.BASE.'/User/homepage?message=Password successfully Changed');
				}else{
					header('location:'.BASE.'/User/changePassword?error=Paswords must be non-empty and match!');
				}
			}else{
				header('location:'.BASE.'/User/changePassword?error=Username/password mismatch!');//reload
			}
		}else{
			$this->view('User/changePassword');
		}
	}

	#[\App\core\LoginFilter]
	function edit($user_id){
		$user = new \App\models\User();
		$user = $user->findWithUserID($user_id);

		if(isset($_POST["action"])){
			$user->first_name = $_POST['first_name'];
			$user->last_name = $_POST['last_name'];
			$user->update();
			header("location:".BASE."/Librarian/listUsers?message=Account Successfully Updated");
		}else{
			$this->view('User/editUser',$user);
		}
	}
}
?>