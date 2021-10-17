<html>

<head>
	<!--Bootsrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!--Fontawesome-->
	<script src="https://kit.fontawesome.com/00b6f97ff2.js" crossorigin="anonymous"></script>

	<title>History page</title>
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
		<li class="nav-item"><a class="nav-item nav-link active" href='<?= BASE ?>/User/history'>View borrow history</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Default/usertwofasetup'>Two factor authentication setup</a></li>
		<li class="nav-item"><a class="nav-item nav-link" href='<?= BASE ?>/Cart/index'>View My Cart</a></li>
		<li class="nav-item"><a class="nav-item bg-danger text-dark" href='<?= BASE ?>/Default/logout/'>Logout</a></li>
	</ul>

	<div class="container">
		<div class='col-md-6'>
			<div class='product-details mr-2'>
				<div class='d-flex justify-content-between'>
					<h4 class="mb-3">Your Book History:</h4>
				</div>
				<?php
				if ($data['history'] != null) {
					foreach ($data['history'] as $item) {
						echo "<div class='d-flex justify-content-between align-items-center mt-3 p-2 items rounded bg-white'>
                            	<div class='d-flex flex-row'>
									<img class='img-fluid rounded' src='$item->imageUrl' width='15%'>
                                	<div class='ml-2'>
                                    	<span class='font-weight-bold d-block'>$item->title</span>
                                    	<span class='spec'>Author: $item->author</span>
                                	</div>
								</div>
								<div class='d-flex flex-row align-items-center'>
									<span class='d-block'>Type: $item->type</span><br>
								</div>
                        	</div>";
					}
				} else {
					echo "<div class='d-flex justify-content-between align-items-center mt-3 p-2 items rounded bg-white'>
                            	<div class='d-flex flex-row'>
                                	<div class='ml-2'>
                                    	<p class='font-weight-bold d-block'>You haven't borrowed or bought a book yet</p>
                                	</div>
								</div>
                        	</div>";
				}
				?>
			</div>
		</div>
	</div>
</body>

</html>