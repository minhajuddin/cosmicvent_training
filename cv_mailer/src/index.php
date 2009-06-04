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
					<li><a href="index.php" class="current">Home</a></li>
					<li><a href="search.php">Search</a></li>
				</ul>
			</div>
			<div id="page">
				<div id="header"><h1>EMail Application</h1></div>
				<div id="content">
					<?php
					if(isset($_GET["error"]))
					echo '<p class="error">Error: Mail could not be sent due to some reasons: <br />1. Your computer may not be connected to the internet.<br />2. Your SMTP server may be down.';
					else if(isset($_GET["success"]))
					echo '<p class="success">Mail has been sent successfully</p>';
					else if(isset($_GET["form"]))
					echo '<p class="error">Mail could not be sent due to mistakes in the form. Correct them and send it again.';
					?>
					<form action="Core/Main/Sendmail.php" method="post">
						<fieldset>
							<legend>Mail</legend>
							<p><label>From: </label><input type="text" id="from" name="from" /></p>
							<p><label>Subject: </label><input type="text" id="subject" name="subject" /></p>
							<p><label>Message: </label><textarea id="message" rows="10" cols="50" name="message"></textarea></p>
							<p><input type="submit" id="submit" value="Send" /></p>
						</fieldset>
					</form>
					<div class="wmd-preview"></div>
					<script type="text/javascript" src="wmd/wmd.js"></script>
				</div>
				<div id="sidebar">
					<h3>Tips:</h3>
					<ul>
						<li>User Id = [__user_id__]</li>
						<li>User Name = [__user_name__]</li>
						<li>User Email = [__user_email__]</li>
						<li>User Active = [__user_active__]</li>
					</ul>
					<h3>Templates</h3>
					<p><select id="templates">
					<option>--None--</option>
					<?php
					include 'Core/DataAccess/MySQLDA.php';

					$da = new MySQLDA;
					$templates = $da->getTemplates();
					$names = array_keys($templates);
					foreach($names as $name)
					{
						echo '<option>' . $name . '</option>';
					}
					?>
					</select></p>
					<h3>Add User</h3>
					<form action="index.php" method="get">
						<p>Name: <br /><input type="text" id="userName" size="10" /></p>
						<p>Email: <br /><input type="text" id="userEmail" size="10" /></p>
						<p><input type="button" id="addUser" value="Add" /></p>
					</form>
					<h3>Save Template</h3>
					<form action="" method="get">
						<p><input type="text" id="templateName" size="10" /></p>
						<p><input type="button" id="saveTemplate" value="Save" /></p>
					</form>
				</div>
				<div id="footer">
					<p>Powered by CosmicVent | <a href="http://jigsaw.w3.org/css-validator/check/referer">Valid CSS</a> | <a href="http://validator.w3.org/check?uri=referer">Valid XHTML</a></p>
				</div>
			</div>
		</div>
	</body>
</html>