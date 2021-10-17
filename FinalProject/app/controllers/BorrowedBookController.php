<?php
namespace App\controllers;

class BorrowedBookController extends \App\core\Controller{
	#[\App\core\LoginFilter]
	#[\App\core\LibrarianFilter]
	function index(){
        $this->view('BorrowedBook/searchUser');
	}

	#[\App\core\LibrarianFilter]
	function searchUser() {
        if (isset($_POST["action"])) {
            if (!is_null($_POST['keyword']) && !empty(trim($_POST['keyword']))) {
				$user = new \App\models\User();
                $users = $user->searchUser($_POST['keyword']);

				if ($users != null) {
					$this->view('BorrowedBook/viewUsers', $users);
				} else {
					header("location:".BASE."/BorrowedBook/searchUser?error=User Not Found!!");
				}
            } else {
                header("location:".BASE."/BorrowedBook/searchUser");
            }
        } else {
        	$this->view('BorrowedBook/searchUser');
        }
    }

	#[\App\core\LibrarianFilter]
	function viewUserBorrowedBooks($user_id) {
		$borrowed = new \App\models\BorrowedBook();
        $borrowedBooks = $borrowed->selectAllBorrowedBooksByUser($user_id);
		
		$this->view('BorrowedBook/viewUserBorrowedBooks', $borrowedBooks);
    }

	#[\App\core\UserFilter]
	function borrow($book_id) {
		// Check amount
		$book = new \App\models\Book();
		$book = $book->find($book_id);
		$amount = $book->amount;

		if ($amount != 0) {
			$borrowedBook = new \App\models\BorrowedBook();
			$borrowedBook->user_id = $_SESSION['user_id'];
			$borrowedBook->book_id = $book_id;
			$borrowedBook->insert();

			$history = new \App\models\History();
			$history->user_id = $_SESSION['user_id'];
			$history->book_id = $book_id;
			$history->type = 'borrowed';
			$history->insert();
			//remove 1 from amount in book
			$book->removeFromAmount();
			//Show succes alert
			header("location:".BASE."/Book/userCatalog?message=Book Successfully Borrowed");
		} else {
			//Show danger alert
			header("location:".BASE."/Book/userCatalog?error=Book Couldn't be borrowed");
		}
	}

	#[\App\core\LibrarianFilter]
	function extend($borrowed_id){
		$book = new \App\models\BorrowedBook();
		$book = $book->find($borrowed_id);

		$reservation = new \App\models\Reservation();
		$reservations = $reservation->selectAllReservedBooksByBookID($book->book_id);

		if (!is_null($reservations)) {
			$book->updateReturnDate();
			//Add success alert
			header("location:".BASE."/BorrowedBook/searchUser?message=Borrowed Time Extended!");
		} else {
			//Add danger alert
			header('location:'.BASE.'/BorrowedBook/searchUser?error=Cannot Extend Borrowed Time!');
		}
	}

	#[\App\core\UserFilter]
	function return($borrowed_id){
		$borrowed = new \App\models\BorrowedBook();
		$borrowed = $borrowed->find($borrowed_id);
		$borrowed->delete();
		header("location:".BASE."/User/homepage?message=Book Successfully Returned");
	}

	#[\App\core\LibrarianFilter]
	function delete($borrowed_id){
		$borrowed = new \App\models\BorrowedBook();
		$borrowed = $borrowed->find($borrowed_id);

		$book = new \App\models\Book();
		$book = $book->find($borrowed->book_id);
		
		$borrowed->delete();
		$book->addToAmount();
		header("location:".BASE."/BorrowedBook/searchUser?message=Book Successfully Returned");
	}

}
?>