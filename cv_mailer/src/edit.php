<?php
include 'Core/Classes/User.php';
include 'Core/DataAccess/MySQLDA.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
File: search.php
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
				</ul>
			</div>
			<div id="page">
				<div id="header"><h1>EMail Application</h1></div>
				<div id="content">
					<?php
					if(isset($_GET["success"]))
						echo '<p class="success">Edited successfully';
					if(isset($_GET["error"]))
						echo '<p class="error">An error occurred while editing';
					if(isset($_GET["email"]))
						echo '<p class="error">Email is invalid';

					if(isset($_GET["id"]))
					{
						$id = $_GET["id"];
						$da = new MySQLDA;
						$user = $da->getUserById($id);
						if($user->active == "Active")
							$active = 1;
						else
							$active = 0;
						echo '<form action="Core/Main/Edit.php" method="post">';
						echo '<input type="hidden" name="id" value="' . $user->id . '" />';
						echo '<p><label>Name: </label><input type="text" id="userName" name="name" value="' . $user->name . '" /></p>';
						echo '<p><label>Email: </label><input type="text" id="userEmail" name="email" value="' . $user->email . '" /></p>';
						echo '<p><label>Active: </label><input type="radio" name="active" value="Active" ';if($active) echo "checked"; echo ' />Active  <input type="radio" name="active" value="Inactive" ';if(!$active) echo "checked"; echo ' />Inactive';
						echo '<p><input type="submit" value="Save" id="submit" />';
					}
					else
						header("Location: search.php?edit=true");
					?>
				</div>
				<div id="sidebar">
					<h3>Add User</h3>
					<form action="index.php" method="get">
						<p>Name: <br /><input type="text" id="userName" size="10" /></p>
						<p>Email: <br /><input type="text" id="userEmail" size="10" /></p>
						<p><input type="button" id="addUser" value="Add" /></p>
					</form>
				</div>
				<div id="footer">
					<p>Powered by CosmicVent | <a href="http://jigsaw.w3.org/css-validator/check/referer">Valid CSS</a> | <a href="http://validator.w3.org/check?uri=referer">Valid XHTML</a> | <a href="login.php?logout">Logout</a></p>
				</div>
			</div>
		</div>
	</body>
</html>