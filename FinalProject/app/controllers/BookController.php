<?php
namespace App\controllers;

class BookController extends \App\core\Controller{
	#[\App\core\LoginFilter]
	#[\App\core\UserFilter]
	function index(){
		$book = new \App\models\Book();
		$books = $book->selectAllBooks();
		
		$user = new \App\models\User();
		if($user->isLibrarian($_SESSION['user_id'])){
			$this->view('Book/librarianCatalog', $books);
		} else {
			$this->view('Book/userCatalog', $books);
		}
	}

	#[\App\core\UserFilter]
	function searchBook() {
        if (isset($_POST["action"])) {
            if (!is_null($_POST['keyword']) && !empty(trim($_POST['keyword']))) {
				$book = new \App\models\Book();
                $books = $book->searchBook($_POST['keyword']);
				if ($books != null) {
					$this->view('User/viewBooks', $books);
				} else {
					header("location:".BASE."/Book/searchBook?error=Book Not Found!!");
				}
            } else {
                header("location:".BASE."/User/searchBook");
            }
        } else {
        	$this->view('User/searchBook');
        }
    }

	#[\App\core\UserFilter]
	function details($book_id) {
		$book = new \App\models\Book();
		$book = $book->find($book_id);
		$this->view('Book/bookDetails',$book);
	}

	#[\App\core\LibrarianFilter]
	function add() {
		if (isset($_POST["action"])) {
			if (!empty($_POST["title"]) && !empty($_POST["author"]) && !empty($_POST["book_desc"]) 
				&& !empty($_POST["price"]) && !empty($_POST['amount'])) {
				$book = new \App\models\Book();

				$book->title = $_POST["title"];
				$book->author = $_POST["author"];
				$book->book_desc = $_POST["book_desc"];
				$book->price = $_POST["price"];
				$book->amount = $_POST['amount'];
				$book->imageUrl = $_POST['imageUrl'];
				$book->insert();

				header("location:".BASE."/Book/add?message=Book Successfully Added");
			} else {
				header("location:".BASE."/Book/add?error=Enter Book Information");
			}
		} else {
			$this->view('Book/addBook');
		}
	}

	#[\App\core\LibrarianFilter]
	function edit($book_id){
		$book = new \App\models\Book();
		$book = $book->find($book_id);
		if(isset($_POST["action"])){
			$book->title = $_POST["title"];
			$book->author = $_POST["author"];
			$book->book_desc = $_POST["book_desc"];
			$book->price = $_POST["price"];
			$book->amount = $_POST['amount'];
			$book->update();

			header("location:".BASE."/Librarian/Homepage?message=Book Successfully Edited");
		}else{
			$this->view('Book/editBook',$book);
		}
	}

	#[\App\core\LibrarianFilter]
	function delete($book_id){
		$borrowed = new \App\models\BorrowedBook();
		$borrowed->deleteRelatedToBook($book_id);
		$cart = new \App\models\Cart();
		$cart->deleteRelatedToBook($book_id);
		$history = new \App\models\History();
		$history->deleteRelatedToBook($book_id);
		$reservation = new \App\models\Reservation();
		$reservation->deleteRelatedToBook($book_id);

		$book = new \App\models\Book();
		$book = $book->find($book_id);
		$book->delete();
		header("location:".BASE."/Librarian/Homepage?message=Book Successfully Deleted");
	}

}
