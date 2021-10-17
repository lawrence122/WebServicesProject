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

	<title>Edit a Book</title>
</head>

<body class="container" style="background-color: #D6D6D6;">
	<a class="btn btn-light" href="<?= BASE ?>/Librarian/catalog"><i class="fas fa-arrow-left p-r"></i> Back</a>

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
		<div class="mask d-flex align-items-center ">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 col-lg-6 col-xl-5">
						<div class="card" style="border-radius: 1rem;">
							<div class="card-body text-center">
								<div class="my-md-5">
									<h1 class="fw-bold mb-5"><i class="fas fa-book"></i> Edit <?= $data->title ?></h1>
									<form class="well form-horizontal" action=" " method="post">
										<fieldset>
											<div class="form-group">
												<label class="col-md-4 control-label">Image URL:</label>
												<div class="col-md-4 inputGroupContainer">
													<div class="input-group">
														<textarea name="imageUrl" type="text" cols="30" rows="4"><?= $data->imageUrl ?></textarea>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label">Title:</label>
												<div class="col-md-4 inputGroupContainer">
													<div class="input-group">
														<input type="text" name="title" value="<?= $data->title ?>" />
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label">Author:</label>
												<div class="col-md-4 inputGroupContainer">
													<div class="input-group">
														<input type="text" name="author" value="<?= $data->author ?>" />
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label">Description:</label>
												<div class="col-md-4 inputGroupContainer">
													<div class="input-group">
														<textarea type="text" name="book_desc" cols="30" rows="6"><?= $data->book_desc ?></textarea>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label">Price:</label>
												<div class="col-md-4 inputGroupContainer">
													<div class="input-group">
														<input type="number" min="0" name="price" value="<?= $data->price ?>" />
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label">Amount:</label>
												<div class="col-md-4 inputGroupContainer">
													<div class="input-group">
														<input type="number" min="0" name="amount" value="<?= $data->amount ?>" />
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4 control-label"></label>
												<div class="col-md-4 mxy-5"><br>
													<input class="btn btn-success" type="submit" name="action" value="Submit" />
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