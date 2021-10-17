<?php
namespace App\controllers;

class LibrarianController extends \App\core\Controller{
	#[\App\core\LoginFilter]
	#[\App\core\LibrarianFilter]
	function index(){
		$book = new \App\models\Book();
		$books = $book->selectAllBooks();

		$this->view('Librarian/Homepage', ['books'=>$books]);
	}

	#[\App\core\LibrarianFilter]
	function listUsers(){
		$user = new \App\models\User();
		$users = $user->getAllRegularUsers();

		$this->view('Librarian/userList', ['users'=>$users]);
	}

	#[\App\core\LibrarianFilter]
	function confirmDelete($user_id){
		$user = new \App\models\User();
		$user = $user->findWithUserID($user_id);
		
		if(isset($_POST['action'])){
			if(!empty($_POST['username'])) {
				if ($user->username == $_POST['username']){
					$borrowed = new \App\models\BorrowedBook();
					$borrowed->deleteRelatedToUser($user_id);
					$cart = new \App\models\Cart();
					$cart->deleteRelatedToUser($user_id);
					$history = new \App\models\History();
					$history->deleteRelatedToUser($user_id);
					$reservation = new \App\models\Reservation();
					$reservation->deleteRelatedToUser($user_id);
	
					$user->deleteUser($user_id);
					header('location:'.BASE.'/Librarian/listUsers?message=User Successfully Deleted');
				} else{
					header('location:'.BASE.'/Librarian/listUsers?error=Wrong Username');
				} 
			} else {
				header('location:'.BASE.'/Librarian/listUsers?error=Enter a Username');
			}
		}else{
			$this->view('Librarian/confirmUserDeletion');
		}
	}

	#[\App\core\LibrarianFilter]
	function addMoney($user_id){
		$user = new \App\models\User();
		$user = $user->findWithUserID($user_id);

		if(isset($_POST["action"])){
			$user->balance = $_POST['balance'];
			$user->updateBalance();
			header("location:".BASE."/Librarian/listUsers?message=Money added to the account");
		}else{
			$this->view('Librarian/addBalance',$user);
		}
	}

	#[\App\core\LibrarianFilter]
	function borrowedBooks(){
		$borrowed = new \App\models\BorrowedBook();
		$borrowed = $borrowed->selectAllBorrowedBooks();

		$this->view('BorrowedBook/viewUserBorrowedBooks', $borrowed);
	}

	#[\App\core\LibrarianFilter]
	function changePassword(){
		if(isset($_POST['action'])){
			$user = new \App\models\User();
			$user = $user->find($_SESSION['username']);
			if( $user != null &&
				password_verify($_POST['password'], $user->password_hash) ){
				if(!empty($_POST['new_password']) && $_POST['new_password'] == $_POST['new_password_confirm']){
					$user->password_hash = password_hash($_POST['new_password'],PASSWORD_DEFAULT);
					$user->updatePassword();
					header('location:'.BASE.'/Librarian/homepage?message=Password Successfully Updated');
				}else{
					header('location:'.BASE.'/Librarian/changePassword?error=Paswords must be non-empty and match!');
				}
			}else{
				header('location:'.BASE.'/Librarian/changePassword?error=Username/password mismatch!');//reload
			}
		}else{
			$this->view('Librarian/changePassword');
		}
	}

	#[\App\core\LoginFilter]
	#[\App\core\LibrarianFilter]
	function edit(){
		$librarian = new \App\models\User();
		$librarian = $librarian->findWithUserID($_SESSION['user_id']);

		if(isset($_POST["action"])){
			$librarian->first_name = $_POST['first_name'];
			$librarian->last_name = $_POST['last_name'];
			$librarian->update();
			header("location:".BASE."/Librarian/homepage?message=Account Successfully Updated");
		}else{
			$this->view('Librarian/editLibrarian',$librarian);
		}
	}

}
?>