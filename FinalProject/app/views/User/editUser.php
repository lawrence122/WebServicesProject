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

	<title>Edit Account</title>
</head>

<body style="background-color: #D6D6D6;">

<ul class="nav nav-pills bg-light mb-5">
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/User/index/'>Homepage</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Book/searchBook'>Search For A Book</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Book'>Public Catalog</a></li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Your Account</a>
			<div class="dropdown-menu">
                <a class="nav-item nav-link" href='<?= BASE ?>/User/edit/'>Edit you account</a>
				<a class="nav-item nav-link" href='<?= BASE ?>/User/changePassword/'>Change your password</a>
			</div>
		</li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/User/history'>View borrow history</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Default/usertwofasetup'>Two factor authentication setup</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Cart/index'>View My Cart</a></li>
		<li class="nav-item"><a class="nav-item bg-danger text-dark" href='<?= BASE ?>/Default/logout/'>Logout</a></li>
	</ul>

	<section class="intro">
		<div class="mask d-flex align-items-center ">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 col-lg-6 col-xl-5">
						<div class="card" style="border-radius: 1rem;">
							<div class="card-body text-center">

								<div class="my-md-5">

									<h1 class="fw-bold mb-5"><i class="fas fa-user-circle"></i> Edit Your Profile</h1>

									<form class="well form-horizontal" action=" " method="post">
										<fieldset>
											<div class="form-group">
												<input type="text" name="first_name" class="form-control" value="<?= $data->first_name ?>" />
											</div>

											<div class="form-group">
												<input type="text" name="last_name" class="form-control" value="<?= $data->last_name ?>" />
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label"></label>
												<div class="col-md-4 mxy-5"><br>
													<input class="btn btn-success" type="submit" name="action" value="Submit Changes">
												</div>
											</div>
										</fieldset>
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