<html>

<head>
    <!--Bootsrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/00b6f97ff2.js" crossorigin="anonymous"></script>

    <title>Search Book Page</title>
</head>

<body style="background-color: #D6D6D6;">
    <ul class="nav nav-pills bg-light mb-5">
        <li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/User/index/'>Homepage</a></li>
        <li class="nav-item"><a class="nav-item nav-link active" href='<?= BASE ?>/Book/searchBook'>Search For A Book</a></li>
        <li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Book'>Public Catalog</a></li>
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

    <section class="intro">
        <div class="mask d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="pb-5">
                                    <h1 class="fw-bold mb-5">Search Books</h1>
                                    <form method="post" action="">
                                        <div class="container">
                                            <div class="form-group">
                                                <input class="col-md-4 form-control border-end-0 border rounded-pill" name="keyword" type="search" placeholder="Search...">
                                                <div class="col-md-4" style="margin-left: -55px;">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-outline-secondary bg-white rounded-pill mt-1" type="submit" name="action">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>