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

    <title>User List</title>
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
        <li class="nav-item"><a class="nav-item nav-link active" href='<?= BASE ?>/Librarian/listUsers/'>List Users</a></li>
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
        if ($data != null) {
            echo "<div class='row'>";
            foreach ($data['users'] as $user) {
                echo "<div class='col-md-3'>
                        <div class='card mb-4 box-shadow'>
                            <div class='card-body'> 
                                <h5 class='card-title'>Username: $user->username</h5>
                                <p class='card-text'>First Name: $user->first_name</p>
                                <p class='card-text'>Last Name: $user->last_name</p>
                                <p class='card-text'>Balance: $user->balance</p>
                            </div>
                            <div class='card-footer align-items-center'>
                                <button type='button' class='btn btn-primary addBalance' data-toggle='modal' data-target='#addBalanceModal' 
                                    data-action='" . BASE . "/librarian/addmoney/$user->user_id'>
                                    Set Balance
                                </button>
                                <button type='button' class='btn btn-warning editUser' data-toggle='modal' data-target='#editUserModal' 
                                    data-username='$user->username' data-first='$user->first_name' data-last='$user->last_name'
                                    data-action='" . BASE . "/User/edit/$user->user_id'>
                                    Edit User
                                </button>
                                <button type='button' class='btn btn-danger deleteUser' data-toggle='modal' data-target='#deleteUserModal' 
                                    data-action='" . BASE . "/librarian/confirmDelete/$user->user_id'>
                                    Delete User
                                </button>
                            </div>
                        </div>
                    </div>";
            }
            echo "</div>";
        }
        ?>
    </div>

    <div class="modal fade" id="addBalanceModal" tabindex="-1" role="dialog" aria-labelledby="addBalanceModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="addBalanceModalTitle">Set Balance</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addBalanceForm" action="" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Balance:</label>
                            <input id="recipient-balance" min="0" type="number" class="form-control" name="balance" />
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-success" type="submit" name="action" value="Submit">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center mr-4" id="editUserModalTitle">Edit</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="well form-horizontal" id="editUserForm" action="" method="post">
                        <div class="form-group">
                            <label class="control-label">First Name:</label>
                            <input id="modal-first" type="text" name="first_name" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Last Name:</label>
                            <input id="modal-last" type="text" name="last_name" />
                        </div>

                        <div class="modal-footer">
                            <input class="btn btn-success" type="submit" name="action" value="Submit" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center mr-4" id="deleteUserModalTitle">Are you sure you want to delete this user?</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="well form-horizontal" id="deleteUserForm" action="" method="post">
                        <div class="form-group">
                            <label class="control-label">Input the user's username to proceed:</label>
                            <input type="text" name="username" />
                        </div>

                        <div class="modal-footer">
                            <input class="btn btn-danger" type="submit" name="action" value="Confirm Deletion" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>