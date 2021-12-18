<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<?php
		if (isset($_GET['error'])) {
			echo "<script type='text/javascript'> alert('$_GET[error]'); </script>";
		}
	?>
	<div id="wrapper">

    	<form method="post" action="">

    		<div id="form">
    			<label>Email: 
					<input type="text" id="user" name="email">
				</label><br><br>

				<label>Password: 
					<input type="password" id="pswd" name="password">
				 </label><br><br>
    		</div>

			<input type="submit" name="action" value="Login" id="login_btn">
			
		</form>

		<p>No account?
			<a href="<?=BASE?>/Default/register">Register Here.</a>
		</p>

	</div>
</body>
</html>