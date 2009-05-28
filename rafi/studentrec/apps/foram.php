<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Success Record addition</title> 
<link type="text/css" rel="stylesheet" href="../css/index.css" />
</head>

<body>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

if (mysql_query("CREATE DATABASE my_db",$con))
  {
  echo "Database created";
  }
else
  {
 
  }

//Create table

mysql_select_db("my_db", $con);
$sql = "CREATE TABLE Students
(
personID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(FirstName),
FirstName varchar(15) ,
LastName varchar(15),
Age int,
EdQualf varchar(15),
UNIQUE KEY(Firstname)
)";

// Execute query

mysql_query($sql,$con);

$sql="INSERT INTO Students (FirstName, LastName, Age, EdQualf)
VALUES
('$_POST[FirstName]','$_POST[LastName]','$_POST[Age]','$_POST[EdQualf]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($con)
?> 
<h1>1 Record added Successfully </h1>
<br/><br/>
<a href="../html/foram.html"> Back to the foram </a><br/><br/>
<a href="../index.html"> Back to Home page</a>


</body>
</html>