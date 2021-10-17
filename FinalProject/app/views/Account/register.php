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

	<title>Register an account</title>
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
		<div class="bg-image h-100" style="background-color: #D6D6D6;">
			<div class="mask d-flex align-items-center h-100">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-12 col-md-10 col-lg-7 col-xl-6">
							<div class="card mask-custom">
								<div class="card-body p-5 text-black">
									<div class="my-4">
										<h2 class="text-center mb-5">Registration Form</h2>
										<form action=" " method="post">
											<div class="form-outline form-black mb-4">
												<input name="username" type="text" class="form-control form-control-lg" placeholder="Username" />
											</div>

											<div class="form-outline form-black mb-4">
												<input type="password" name="password" placeholder="Password" class="form-control form-control-lg" />
											</div>

											<div class="form-outline form-black mb-4">
												<input type="password" name="password_confirm" placeholder="Confirm Password" class="form-control form-control-lg" />
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label"></label>
												<div class="col-md-4 mxy-5"><br>
													<input class="btn btn-warning" type="submit" name="action" value="Submit" />

												</div>
											</div>

										</form>
										<br>
										<!-- <div class="text-center">
											<p>Already have an account? <a href="<?= BASE ?>/Default/login">Login.</a></p>
										</div> -->
									</div>
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