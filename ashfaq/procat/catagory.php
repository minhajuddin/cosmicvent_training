<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>add catagoery</title> 
<link type="text/css" rel="stylesheet" href="design.css" />
<style type="text/css">

</style> 
</head>
<body>

<?php

$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("my_ash", $con);


$result = mysql_query("SELECT * FROM catagoery");




mysql_select_db("my_ash", $con);


 


$sql="INSERT INTO catagoery (cid,cname)
VALUES
('$_POST[cid]','$_POST[cname]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "";

mysql_close($con)
?> 

<a href="home.php">back to home</a>
</body>
</html>