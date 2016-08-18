<!DOCTYPE HTML>
<html>
	<head>
		<title>My Index Page</title>
		
		<style type="text/css">
			.container {
				width: 35%;
				margin-left: auto;
				margin-right: auto;
			}

		</style>

	</head>

	<body>
		<div class="container">
			<fieldset>
				<legend>Login</legend>
				<form action="login.php" method="POST">
					<input type="text" name="username" placeholder="Username">
					<input type="text" name="password" placeholder="Password">
					<input type="submit" name="login" value="Login">
				</form>
			</fieldset>

			<fieldset>
				<legend>Register</legend>
				<form action="register.php" method="POST">
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="register" value="Register">
				</form>
			</fieldset>
		</div>
	</body>
</html>