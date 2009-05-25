

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
)ENGINE=INNODB;
";

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
TitleCommId int, 
INDEX (TitleCommId),
FOREIGN KEY (TitleCommId) REFERENCES Bloginfo (postID)
)ENGINE=INNODB";

// Execute query
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

// Adding the new post


$TimeStamp=date("Y/m/d");
$escp_Title = mysql_escape_string($_POST[Title]);
$escp_AuthName = mysql_escape_string($_POST[AuthName]);
$escp_Comments = mysql_escape_string($_POST[AuthName]);

$sql="INSERT INTO Bloginfo (Title, AuthName, Comments,TimeStamp)
VALUES ('$escp_Title','$escp_AuthName','$escp_Comments','$TimeStamp')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
echo "<h1>Your Comments are posted successfully</h1>";

mysql_close($con);
header("location: ../index.php");
?> 
