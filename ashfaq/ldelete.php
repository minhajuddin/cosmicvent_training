<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>this is existing products</title> 
<link type="text/css" rel="stylesheet" href="design.css" />
</head>

<body>


<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_ash", $con);


$result = mysql_query("SELECT * FROM catalogue");

mysql_close($con);
?>

<h1> Product deleted successfully </h1>




<p><a href="home.php">back to main page</a>

</p>



</body>
</html> 

