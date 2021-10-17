<html>

<head>
	<!--Bootsrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!--Fontawesome-->
	<script src="https://kit.fontawesome.com/00b6f97ff2.js" crossorigin="anonymous"></script>

	<!--Stylesheet-->
	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>This is Librarian home page</title>
</head>

<body style="background-color: #D6D6D6;">
	<ul class="nav nav-pills bg-light mb-5">
		<li class="nav-item"><a class="nav-item nav-link active" href='<?= BASE ?>/Librarian/index/'>Homepage</a></li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Your Account</a>
			<div class="dropdown-menu">
				<a class="nav-item nav-link" href='<?= BASE ?>/Librarian/edit/'>Edit your account</a>
				<a class="nav-item nav-link" href='<?= BASE ?>/Librarian/changePassword/'>Change your password</a>
			</div>
		</li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Default/librariantwofasetup/'>Two factor authentication setup</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Librarian/listUsers/'>List Users</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Book/add/'>Add book to catalog</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Reservation/index/'>View Books on Reservation</a></li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Search</a>
			<div class="dropdown-menu">
				<a class="nav-item nav-link" href='<?= BASE ?>/Reservation/searchUser/'>Search Currently Reserved Books</a>
				<a class="nav-item nav-link" href='<?= BASE ?>/BorrowedBook/searchUser/'>Search Currently Borrowed Books</a>
			</div>
		</li>
		<li class="nav-item"><a class="nav-item bg-danger text-dark" href='<?= BASE ?>/Default/logout/'>Logout</a></li>
	</ul>

	<?php
	if (isset($_GET['message'])) {
		echo '<div class="container alert alert-success" role="alert">' . $_GET['message'] . '
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
		  			</button>
				</div>';
	}
	if (isset($_GET['error'])) {
		echo '<div class="container alert alert-danger" role="alert">' . $_GET['error'] . '
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
	  			</button>
			</div>';
	}
	?>

	<div class="container">
		<?php
		if ($data['books'] != null) {
			echo "<div class='row'>";
			foreach ($data['books'] as $book) {
				echo "<div class='col-md-4'>
						<div class='card mb-4 box-shadow'>
							<img class='card-img-top img-fluid rounded' src='$book->imageUrl' alt='Card image cap'>
							<div class='card-body'> 
								<h4 class='card-title'>$book->title</h4>
								<i class='card-text'>$book->author</i>
								<p class='card-text text-truncate'>$book->book_desc</p>
							</div>
							<div class='card-footer d-flex justify-content-between align-items-center'>
								<div class='btn-group'>
									<a href='" . BASE . "/Book/edit/$book->book_id'>
										<button type='button' class='btn btn-sm btn-primary'>Edit</button>
									</a>
									<a href='" . BASE . "/Book/delete/$book->book_id'>
										<button type='button' class='btn btn-sm btn-danger'>Delete</button>
									</a>
								</div>
								<small class='text-muted'>$$book->price</small>
							</div>
						</div>
					</div>";
			}
			echo "</div>";
		}
		?>
	</div>
</body>

</html>