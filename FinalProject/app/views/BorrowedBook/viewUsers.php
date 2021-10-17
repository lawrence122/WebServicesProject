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

    <a class="btn btn-light" href="<?= BASE ?>/BorrowedBook/searchUser"><i class="fas fa-arrow-left p-r"></i> Back</a>

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
        foreach ($data as $user) {
            echo "<div class='list-group-item list-group-item-action flex-column align-items-start'>
                    <div class='d-flex w-100 justify-content-between'>
                        <h5 class='mb-1 font-weight-bold'>Username: $user->username</h5>
                        <small><a href='" . BASE . "/BorrowedBook/viewUserBorrowedBooks/$user->user_id'><i class='fas fa-book'></i></i></a></small>
                    </div>
                    <div class='d-flex w-100 justify-content-between'>
                        <p class='mb-1'>First Name: $user->first_name</p>
                        <p>Last Name: $user->last_name</p>
                    </div>
                  </div>";
        }
        echo "</div></div></div></div></div></div></div></section>";
    }
    ?>

</body>

</html>