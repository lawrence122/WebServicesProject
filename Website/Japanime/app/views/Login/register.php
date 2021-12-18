<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>
	<?php
		if(isset($_GET['error'])) {
			echo "<script type='text/javascript'> alert('$_GET[error]'); </script>";
		}
	?>
	<div id="wrapper">
		<form name="register" action="" method="POST">
			<h1>Welcome to Cart Shop!</h1>
			<h2>To access our full website, please register below:</h2>

			<p>Fields indicated by <span class="star">*</span> are obligatory.</p>

			<div id="form">
				<label><span class="star">*</span>Email: </label>
				<input type="text" id="email" name="email" required><br><br>

				<label><span class="star">*</span>Select a password: </label>
					<input type="password" id="pswd" name="password" required><span class="tooltiptext">
				<br><br>
			</div>
			<br>

			<input type="submit" id="register" name="action" value="Register">
		</form>

		<p>Already have an account? 
			<a href="<?=BASE?>/Default/login" id="">Login.</a>
		</p>
	</div>
</body>
</html>