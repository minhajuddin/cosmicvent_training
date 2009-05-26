<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 
 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<title>delete product</title>
<link type="text/css" rel="stylesheet" href="design.css"/>
</title>
</head>

<body class=delete>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_ash", $con);


mysql_query("DELETE FROM catalogue WHERE name='$_POST[name]'");

mysql_close($con);
?> 

<h1> Product deleted successfully </h1>

<a href="home.php"><b>Go back to main menu</b></a>
</body>
</html>