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
					<li><a href="search.php" class="current">Search</a></li>
				</ul>
			</div>
			<div id="page">
				<div id="header"><h1>EMail Application</h1></div>
				<div id="content">
					<form action="search.php" method="get">
						<p><label>Search: </label><input type="text" name="q" value="<?php if(isset($_GET["q"])) echo $_GET["q"]; ?>" /><input type="submit" value="Search" /></p>
					</form>
					<?php
					if(isset($_GET["q"]))
					{
						echo '<table style="margin: 10px;" width="50%">
							<th>Name</th><th>Email</th><th>Active</th><th>Edit</th>';
						$da = new MySQLDA;
						$users = $da->searchUsers($_GET["q"]);
						foreach($users as $user)
						{
							echo '<tr><td>' . $user->name . '</td><td>' . $user->email . '</td><td>' . $user->active . '</td><td><a href="edit.php?id=' . $user->id . '">Edit</a></td></tr>';
						}
						echo '</table>';
					}
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
					<p>Powered by CosmicVent | <a href="http://jigsaw.w3.org/css-validator/check/referer">Valid CSS</a> | <a href="http://validator.w3.org/check?uri=referer">Valid XHTML</a> | <a href="index.php">Clear</a></p>
				</div>
			</div>
		</div>
	</body>
</html>