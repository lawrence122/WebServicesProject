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

	<title>Log into an account</title>
</head>

<body>
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
		<div class="mask d-flex align-items-center h-100" style="background-color: #D6D6D6;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 col-lg-6 col-xl-5">
						<div class="card" style="border-radius: 1rem;">
							<div class="card-body p-5 text-center">
								<div class="my-md-5 pb-5">
									<h1 class="fw-bold mb-0">Welcome</h1>
									<i class="fas fa-book-reader fa-3x my-5"></i>
									<form method="post" action="">
										<div class="form-outline mb-4">
											<input type="text" name="username" class="form-control form-control-lg" placeholder="Username" />
										</div>

										<div class="form-outline mb-5">
											<input type="password" name="password" class="form-control form-control-lg" placeholder="Password" />
										</div>
										<input class="btn btn-primary btn-lg btn-rounded gradient-custom text-body px-5" type="submit" name="action" value="Login" />

									</form>

								</div>

								<div>
									<p>New user? <a href="<?= BASE ?>/Default/register">Sign Up</a></p>
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