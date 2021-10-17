<html>

<head>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">

	<!--Bootsrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!--Fontawesome-->
	<script src="https://kit.fontawesome.com/00b6f97ff2.js" crossorigin="anonymous"></script>

	<title>This is user homepage</title>
</head>

<body style="background-color: #D6D6D6;">
	<ul class="nav nav-pills bg-light mb-5">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Your Lists</a>
			<div class="dropdown-menu">
				<a class="nav-item nav-link" href='#'>Anime List</a>
				<a class="nav-item nav-link" href='#'>Manga list</a>
			</div>
		</li>
		<li class="nav-item"><a class="nav-item text-dark" href='#'>Notification</a></li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Username</a>
			<div class="dropdown-menu">
				<a class="nav-item nav-link" href='<?= BASE ?>/User/profile/'>Profile</a>
				<a class="nav-item nav-link" href='#'>Account Settings</a>
				<a class="nav-item nav-link" href='<?= BASE ?>/User/logout/'>Log out</a>
			</div>
		</li>
	</ul>

	<ul class="nav nav-pills bg-light mb-5">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Anime</a>
			<div class="dropdown-menu">
				<a class="nav-item nav-link" href='#'>Anime Search</a>
				<a class="nav-item nav-link" href='#'>Top Anime</a>
				<a class="nav-item nav-link" href='#'>Seasonal Anime</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Manga</a>
			<div class="dropdown-menu">
				<a class="nav-item nav-link" href='#'>Manga Search</a>
				<a class="nav-item nav-link" href='#'>Top Manga</a>
				<a class="nav-item nav-link" href='#'>Manga Store??</a>
			</div>
		</li>
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

	default homepage stuff
</body>

</html>