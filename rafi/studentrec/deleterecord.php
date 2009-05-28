
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 
 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<title>delete students record</title>
<link type="text/css" rel="stylesheet" href="../css/index.css"/>
</title>
</head>


<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);

echo "$_POST[some] <strong> record deleted</strong>";
echo "DELETE FROM students WHERE LastName='$_GET[some]'";
mysql_query("DELETE FROM students WHERE LastName='$_GET[some]'");


mysql_close($con);
?> 
</br> </br>

<a href="../index.html">back to main page</a>
</body>
</html>