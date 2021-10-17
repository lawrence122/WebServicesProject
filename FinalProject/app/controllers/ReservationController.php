<?php
namespace App\controllers;

class ReservationController extends \App\core\Controller{
	#[\App\core\LoginFilter]
	function index(){
		$reservation = new \App\models\Reservation();
		$reservations = $reservation->selectAll();
		
        $this->view('Reservation/index', $reservations);
	}

	#[\App\core\LibrarianFilter]
	function searchUser() {
        if (isset($_POST["action"])) {
            if (!is_null($_POST['keyword']) && !empty(trim($_POST['keyword']))) {
				$user = new \App\models\User();
                $users = $user->searchUser($_POST['keyword']);
				if ($users != null) {
					$this->view('Reservation/viewUsers', $users);
				} else {
					header("location:".BASE."/Reservation/searchUser?error=User Not Found!!");
				}
            } else {
                header("location:".BASE."/Reservation/searchUser");
            }
        } else {
        	$this->view('Reservation/searchUser');
        }
    }

	#[\App\core\LibrarianFilter]
	function viewUserReservedBooks($user_id) {
		$reserved = new \App\models\Reservation();
        $reservedBooks = $reserved->selectAllReservedBooksByUser($user_id);

        $this->view('Reservation/viewUserReservedBooks', $reservedBooks);
    }

	function borrowIfStocked($resv_id){
		$reservation = new \App\models\Reservation();
		$reservation = $reservation->find($resv_id);

		$reservedBook = new \App\models\Book();
		$reservedBook->find($reservation->book_id);
		if($reservedBook->isStocked($reservation->book_id)){
			$borrow = new \App\models\BorrowedBook();
			$borrow->user_id = $reservation->user_id;
			$borrow->book_id = $reservation->book_id;
			$borrow->insert();
			$reservedBook->removeFromAmount();
		}
	}

	#[\App\core\UserFilter]
	function add($book_id) {
		// Check amount
		$book = new \App\models\Book();
		$book = $book->find($book_id);
		$amount = $book->amount;

		if ($amount == 0) {
			$item = new \App\models\Reservation();
			$item->user_id = $_SESSION["user_id"];
			$item->book_id = $book_id;
			$item->insert();
			//Show succes alert
			header("location:".BASE."/Book/userCatalog?message=Reservation Successful");
		} else {
			//Show danger alert
			header("location:".BASE."/Book/userCatalog?error=Could not put a reservation on this book");
		}
	}

	#[\App\core\UserFilter]
	function delete($resv_id){
		$reservation = new \App\models\Reservation();
		$reservation = $reservation->find($resv_id);
		$reservation->delete();
		header("location:".BASE."/User/homepage?message=Reservation Deleted");
	}

	#[\App\core\LibrarianFilter]
	function librarianDelete($resv_id){
		$reservation = new \App\models\Reservation();
		$reservation = $reservation->find($resv_id);
		$reservation->delete();
		header("location:".BASE."/Librarian/homepage?message=Reservation Deleted");
	}

}
