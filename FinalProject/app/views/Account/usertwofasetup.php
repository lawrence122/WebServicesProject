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

	<title>2fa set up</title>
</head>

<body style="background-color: #D6D6D6;">
<ul class="nav nav-pills bg-light mb-5">
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/User/index/'>Homepage</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Book/searchBook'>Search For A Book</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Book'>Public Catalog</a></li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Your Account</a>
			<div class="dropdown-menu">
				<a class="nav-item nav-link" href='<?= BASE ?>/User/changePassword/'>Change your password</a>
			</div>
		</li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/User/history'>View borrow history</a></li>
		<li class="nav-item"><a class="nav-item nav-link active" href='<?= BASE ?>/Default/usertwofasetup'>Two factor authentication setup</a></li>
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
		<img src="<?= BASE ?>/Default/makeQRCode?data=<?= $data ?>" /><br>

		Please scan the QR-code on the screen with your favorite Authenticator software, such as Google Authenticator. The authenticator software will generate codes that are valid for 30 seconds only. Enter such a code while and submit it while it is still valid to confirm that the 2-factor authentication can be applied to your account.
		<form method="post" action="">
			<label>Current code:<input type="text" name="currentCode" /></label>
			<input type="submit" name="action" value="Verify code" />
		</form>
	</div>

</body>

</html>