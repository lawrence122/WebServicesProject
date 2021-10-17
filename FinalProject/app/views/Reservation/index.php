<html>

<head>
	<!--Bootsrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!--Fontawesome-->
	<script src="https://kit.fontawesome.com/00b6f97ff2.js" crossorigin="anonymous"></script>

	<title>Reservation page</title>
</head>

<body style="background-color: #D6D6D6;">
	<ul class="nav nav-pills bg-light mb-5">
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Librarian/index/'>Homepage</a></li>
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
		<li class="nav-item"><a class="nav-item nav-link active" href='<?= BASE ?>/Reservation/index/'>View Books on Reservation</a></li>
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
	date_default_timezone_set("America/Montreal");
	?>

	<?php
	if ($data != null) {
		echo "<section class='intro'>
					<div class='mask d-flex align-items-center '>
						<div class='container'>
							<div class='row justify-content-center'>
								<div class='col-12 col-md-8 col-lg-6 col-xl-5>
									<div class='card' style='border-radius: 1rem;'>
										<div class='card-body text-center'>
											<div class='list-group'>";
		foreach ($data as $item) {
			echo "<div class='list-group-item list-group-item-action flex-column align-items-start'>
                    	<div class='d-flex w-100 justify-content-between'>
                    		<h5 class='mb-1 font-weight-bold'>Username: $item->username</h5>
                    		<small><a href='" . BASE . "/Reservation/librarianDelete/$item->resv_id'><i class='fa fa-trash-o ml-3 text-black-50'></i></a></small>
                		</div>
                		<div class='d-flex w-100 justify-content-between'>
                    		<p class='mb-1'>Book Title: $item->title</p>
                		</div>
						<div class='d-flex w-100 justify-content-between'>
                    		<p>Created on: " . ConvertDateTime($item->created_at) . "</p>
                		</div>
              		</div>";
		}
		echo "</div></div></div></div></div></div></div></section>";
	} else {
		echo "<section class='intro'>
                    <div class='mask d-flex align-items-center mt-5 '>
                        <div class='container'>
                            <div class='row justify-content-center'>
                                <h1 class='container display-2 text-center'>There are no reservation!!</h1>
                            </div>
                        </div>
                    </div>
                </section>";
	}
	?>

</body>

</html>