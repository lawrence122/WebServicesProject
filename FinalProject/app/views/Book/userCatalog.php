<html>

<head>
    <!--Bootsrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/00b6f97ff2.js" crossorigin="anonymous"></script>

    <!--Javascript-->
    <script src="<?= BASE ?>/js/library.js"></script>

    <title>Catalog page</title>
</head>

<body style="background-color: #D6D6D6;">
    <ul class="nav nav-pills bg-light mb-5">
        <li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/User/index/'>Homepage</a></li>
        <li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Book/searchBook'>Search For A Book</a></li>
        <li class="nav-item"><a class="nav-item nav-link active" href='<?= BASE ?>/Book'>Public Catalog</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Your Account</a>
            <div class="dropdown-menu">
                <a class="nav-item nav-link" href='<?= BASE ?>/User/changePassword/'>Change your password</a>
            </div>
        </li>
        <li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/User/history'>View borrow history</a></li>
        <li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Default/usertwofasetup'>Two factor authentication setup</a></li>
        <li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Cart/index'>View My Cart</a></li>
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
        if ($data != null) {
            echo "<div class='row'>";
            foreach ($data as $book) {
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
                                    <button type='button' class='btn btn-primary bookDetails' data-toggle='modal' data-target='#viewDetailsModal' data-image='$book->imageUrl'
                                        data-title='$book->title' data-author='$book->author' data-desc='$book->book_desc' data-price='$book->price'>
                                        View Details
                                    </button>";
                                    if($book->amount > 0){
                                        echo "<a href='" . BASE . "/BorrowedBook/borrow/$book->book_id'>
                                        <button type='button' class='btn btn-sm btn-outline-secondary'>Borrow</button>
                                        </a>";
                                    }else{
                                       echo "<a href='" . BASE . "/Reservation/add/$book->book_id'>
                                            <button type='button' class='btn btn-sm btn-outline-secondary'>Put a Reservation</button>
                                        </a>";
                                    }
                                    echo "
                                    <a href='" . BASE . "/Cart/add/$book->book_id'>
                                        <button type='button' class='btn btn-sm btn-outline-secondary'>Add to Cart</button>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>";
            }
            echo "</div>";
        }
        ?>
    </div>

    <div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="viewDetailsModalTitle">Book Details</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modal-image" class='img-fluid rounded' src='' width='75%' />
                    <div>
                        <label class="col-form-label">Title</label>
                        <p id="modal-title" name="title"></p>
                    </div>
                    <div>
                        <label class="col-form-label">Author</label>
                        <p id="modal-author" name="author"></p>
                    </div>
                    <div>
                        <label class="col-form-label">Description</label>
                        <p id="modal-desc" name="desc"></p>
                    </div>
                    <div>
                        <label class="col-form-label">Price</label>
                        <p id="modal-price" name="price"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>