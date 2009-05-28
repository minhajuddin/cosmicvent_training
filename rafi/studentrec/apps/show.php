<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link type="text/css" rel="stylesheet" href="../css/index.css" />
<title>Existing Record List</title> 
</head>

<body>


<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);

$result = mysql_query("SELECT * FROM Students");

echo "<table border='1' class='show'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Eduaction</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Age'] . "</td>";
  echo "<td>" . $row['EdQualf'] . "</td>";
  echo "</tr>";
  }

echo "</table>";

mysql_close($con);
?> 

<br/><br/>
<a href="../index.html"> Back to Home page</a>

</body>
</html>