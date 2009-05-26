<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Success Record addition</title> 

</head>

<body>




<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



// Execute query


mysql_select_db("my_ash", $con);


$sql="INSERT INTO catalogue (id, name, discription, price,catagoeryid)



VALUES

('$_POST[id]','$_POST[name]','$_POST[discription]','$_POST[price]','$_POST[catagoeryid]')";

if (!mysql_query($sql,$con))
  {
  
  die( '<strong>THERE IS ALREADY A RECORD WITH THE ENTERED ID.<a href ="product.php"> CLICK HERE TO ENTER SOME OTHER ID</a></strong>'.mysql_error());
  
}
echo "<H1> PRODUCT SUCCESSFULLY ADDED <h1>";

mysql_close($con)
?>

<br>
<br>
<br>
<a href="home.php">GO BACK TO MAIN PAGE</a>
</body>
</html>
