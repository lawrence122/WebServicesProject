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
	<!-- <link href="../../../css/"> -->

	<!--Javascript-->
	<script src="../../../js/library.js"></script>

	<title>Validate Login</title>
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
									<p>Enter the 6-digit code from your authenticator application for this domain.</p>
									<form method="post" action="">
										<div class="form-outline mb-4">
											<input type="text" name="username" class="form-control form-control-lg" placeholder="Current Code" />
										</div>

										<input class="btn btn-warning btn-rounded text-body" type="submit" name="action" value="Verify code" />
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