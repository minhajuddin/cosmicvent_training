<?php
session_start();
if(!isset($_SESSION["name"]))
	header("Location:login.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
File: index.php
Author: AbdulSattar(http://isattar.com)
Description: This is the file that is used to display content. It is unique for every theme.
-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="Author" content="AbdulSattar" />
		<script type="text/javascript" src="library/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="jscript.js"></script>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<title>EMail | CosmicVent</title>
	</head>
	<body>
		<div id="wrapper">
			<div id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="search.php">Search</a></li>
					<li><a href="admin.php" class="current">Admin</a></li>
				</ul>
			</div>
			<div id="page">
				<div id="header"><h1>EMail Application</h1></div>
				<div id="content">
				<?php
						if(isset($_GET["success"]))
						{
							if($_GET["success"] == "new")
								echo '<p class="success">Added new Administrator successfully</p>';
							else if($_GET["success"] == "pass")
								echo '<p class="success">Changed password successfully</p>';
						}
						if(isset($_GET["error"]))
						{
							if($_GET["error"] == "new")
								echo '<p class="error">The username is already chosen. Please choose another one.</p>';
							else if($_GET["error"] == "pass")
								echo '<p class="error">The current password is wrong or the new passwords do not match. Please correct the passwords and resend.</p>';
							else
								echo '<p class="error">All fields required. Fill up the entire form and then press submit.</p>';
						}
				?>
				<form action="Core/Main/Admin.php" method="post">
					<fieldset>
					<legend>Add Admin</legend>
					<p><label>Name: </label><input type="text" name="name" /></p>
					<p><label>Password: </label><input type="password" name="pass" /></p>
					<p><input type="submit" id="submit" value="Add" /></p>
					</fieldset>
				</form>
				<form action="Core/Main/Admin.php" method="post">
					<fieldset>
					<legend>Change Pasword</legend>
					<p><input type="hidden" name="currentname" value="<?php echo $_SESSION["name"]; ?>"></p>
					<p><label style="width: 150px;">Current Password: </label><input type="password" name="currentpass" /></p>
					<p><label style="width: 150px;">New Password: </label><input type="password" name="newpass" /></p>
					<p><label style="width: 150px;">Confirm Password: </label><input type="password" name="confirmpass" /></p>
					<p><input type="submit" value="Change" style="margin-left: 150px;" /></p>
					</fieldset>
				</form>
				</div>
				<div id="sidebar">
					
				</div>
				<div id="footer">
					<p>Powered by CosmicVent | <a href="http://jigsaw.w3.org/css-validator/check/referer">Valid CSS</a> | <a href="http://validator.w3.org/check?uri=referer">Valid XHTML</a> | <a href="login.php?logout">Logout</a></p>
				</div>
			</div>
		</div>
	</body>
</html>