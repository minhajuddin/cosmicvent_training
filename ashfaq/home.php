

<html>

<head>


<title>home page</title>

<style type="text/css">
<!--
a:link {color: #000000; text-decoration: underline; }
a:active {color: #0000ff; text-decoration: underline; }
a:visited {color: #008000; text-decoration: underline; }
a:hover {color: #ff0000; text-decoration: none; }
-->
</style> 

</head>
<body>


<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create database
if (!mysql_query("CREATE DATABASE IF NOT EXISTS  my_ash",$con))
  {
  echo "Database not created";
  }


// Create table
mysql_select_db("my_ash", $con);


 $sql = "CREATE TABLE IF NOT EXISTS catagoery
(  
cid int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(cid),
 name varchar( 50  )  NOT  NULL 
 
 )ENGINE=INNODB;";
 
  
  // Execute query


if (!mysql_query($sql,$con))
  {
  die('Could not connect: ' . mysql_error());
  }


// Create table
mysql_select_db("my_ash", $con);
$sql = "CREATE TABLE IF NOT EXISTS catalogue
(
id int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
name varchar(50),
discription varchar(500),
price int,
catagoeryid int,
INDEX (catagoeryid),
FOREIGN KEY (catagoeryid) REFERENCES catagoery(cid)
)ENGINE=INNODB;";

// Execute query


if (!mysql_query($sql,$con))
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_close($con)
?> 


<table border=1 align="left">

<tr><td>
<a href="product.php"><b> ADD PRODUCT</b> </a>
</td></tr>

<tr><td>
<a href="modify.html"><b>MODIFY PRODUCT</b> </a></td>
</tr>

<tr><td>
<a href="delete.html"><b>DELETE PRODUCT<b></a></td>
</tr>


<tr><td>
<a href="catagory.html"><b>products catagory<b></a></td>
</tr>


<tr><td>
<a href="list.php"><b>LIST PRODUCTS</b></a></td>
</tr>
</b>
</table>
&nbsp&nbsp&nbsp

<form action="search.php" method="post">&nbsp&nbsp&nbsp
<input type="text" name="name" value=""  align="left">
&nbsp<input type="submit" name="search" value="SEARCH"  >
</form>

</body>
</html>

