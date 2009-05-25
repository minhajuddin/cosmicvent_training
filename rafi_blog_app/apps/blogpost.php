<!DOCTYPE html
      PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link type="text/css" rel="stylesheet" href="../css/index.css"/>

<title>My Blog Post Site</title>
</head>

<body>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create database
if (mysql_query("CREATE DATABASE IF NOT EXISTS my_blog_db",$con))
  {
  //echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

// Create table Bloginfo
mysql_select_db("my_blog_db", $con);
$sql = "CREATE TABLE IF NOT EXISTS Bloginfo
(
postID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(postID),
Title varchar(80),
AuthName varchar(15),
Comments varchar(200),
TimeStamp varchar(15)
)";

// Execute query
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


  
  // Create table Ucomments
  $sql = "CREATE TABLE IF NOT EXISTS Ucomments
(
commID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(commID),
userName varchar(40),
TitleComm varchar(400),
CommTimeStamp varchar(20),
TitleCommId varchar(20),
FOREIGN KEY (TitleCommId) REFERENCES Bloginfo (Title)
)";

// Execute query
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

// Adding the new post


$TimeStamp=date("Y/m/d");
$sql="INSERT INTO Bloginfo (Title, AuthName, Comments,TimeStamp)
VALUES ('$_POST[Title]','$_POST[AuthName]','$_POST[Comments]','$TimeStamp')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
echo "<h1>Your Comments are posted successfully</h1>";

mysql_close($con);
?> 
<br/><br/>
<a href="../index.php> Go Back to Home Page </a>
</body>
</html>