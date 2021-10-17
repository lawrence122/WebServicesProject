<html>

<head>
    <!--Bootsrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/00b6f97ff2.js" crossorigin="anonymous"></script>

    <title>Borrowed Book Page</title>
</head>

<body style="background-color: #D6D6D6;">

    <?php
    date_default_timezone_set("America/Montreal");
    ?>

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
        <li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Reservation/index/'>View Books on Reservation</a></li>
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Search</a>
            <div class="dropdown-menu">
                <a class="nav-item nav-link" href='<?= BASE ?>/Reservation/searchUser/'>Search Currently Reserved Books</a>
                <a class="nav-item nav-link active" href='<?= BASE ?>/BorrowedBook/searchUser/'>Search Currently Borrowed Books</a>
            </div>
        </li>
        <li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Default/logout/'>Logout</a></li>
    </ul>

    <!-- <img class='img-fluid rounded' src='$reserved->imageUrl' width='15%'> -->

    <div class="container">
        <?php
        if ($data != null) {
            echo "<div class='row'>";
            foreach ($data as $borrowed) {
                echo "<div class='col-md-4'>
						<div class='card mb-4 box-shadow'>
                            <img class='card-img-top img-fluid rounded' src='$borrowed->imageUrl' alt='Card image cap'>
							<div class='card-body'> 
                                <h5 class='card-title'>$borrowed->title</h5>
                                <p class='card-text'>Borrowed Date: " . ConvertDateTime($borrowed->created_at) . "</p>
                                <p class='card-text'>Return Date: " . ConvertDateTime($borrowed->return_date) . "</p>
							</div>
							<div class='card-footer d-flex justify-content-between align-items-center'>
								<div class='btn-group'>
									<a href='" . BASE . "/BorrowedBook/extend/$borrowed->borrowed_id'>
										<button type='button' class='btn btn-sm btn-primary'>Extend Borrowing Time</button>
									</a>
									<a href='" . BASE . "/BorrowedBook/delete/$borrowed->borrowed_id'>
										<button type='button' class='btn btn-sm btn-danger'>Return</button>
									</a>
								</div>
							</div>
						</div>
					</div>";
            }
            echo "</div>";
        } else {
            echo "<section class='intro'>
                    <div class='mask d-flex align-items-center mt-5 '>
                        <div class='container'>
                            <div class='row justify-content-center'>
                                <h1 class='container display-2 text-center'>This user is not currently borrowing anything!!</h1>
                            </div>
                        </div>
                    </div>
                </section>";
        }
        ?>
    </div>

</body>

</html>