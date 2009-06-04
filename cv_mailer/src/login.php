<?php
session_start();
if(isset($_SESSION["name"]))
	header("Location:index.php");
if(isset($_GET["logout"]))
{
	unset($_SESSION["name"]);
	session_destroy();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Login</title>
		<style type = "text/css">
			body {
				font-family: sylfaen, arial, serif;
			}

			form {
				margin: auto;
				width: 500px;
			}

			label {
				float: left;
				width: 100px;
			}

			#login {
				margin-left: 100px;
			}

			.error {
				border: solid 1px #ff0000;
				background-color: #ffaaaa;
				padding: 5px;
			}

			.success {
				border: solid 1px #00ff00;
				background-color: #aaffaa;
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<form action="Core/Main/Login.php" method="post">
			<fieldset>
				<legend>Login</legend>
				<?php if(isset($_GET["name"])) echo '<p class="error">Invalid username or password. Please try again</p>'; ?>
				<?php if(isset($_GET["logout"])) echo '<p class="success">You\'ve successfully logged out.</p>'; ?>
				<p><label>Name: </label><input type="text" name="name" <?php if(isset($_GET["name"])) echo 'value = "' . $_GET["name"] . '"'; ?> /></p>
				<p><label>Password: </label><input type="password" name="pass" /></p>
				<p><input type="submit" value="login" id="login" /></p>
			</fieldset>
		</form>
	</body>
</html>