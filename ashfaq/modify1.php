<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>this is existing products</title> 
<link type="text/css" rel="stylesheet" href="design.css" />
</head>

<body bgcolor=#20b2aa>


<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_ash", $con);

mysql_query("UPDATE catalogue SET name='$_POST[name]', discription ='$_POST[discription]', price='$_POST[price]',catagoeryid='$_POST[catagoeryid]'
 WHERE id = '$_POST[id]'");

echo "<strong>THE UPDATED VALUES ARE :</strong>";

$result = mysql_query("SELECT * FROM catalogue WHERE id='$_POST[id]'");

echo "<table border='1' bgcolor=#ffffff>
<tr>
<th>id</th>
<th>name</th>
<th>discription</th>
<th>price</th>
<th>cname</th>


</tr>";
$row = mysql_fetch_array($result);
  


echo "<form action='modify1.php' method='post'>";
  echo "<tr>";
  echo "<td>$row[id]</td>";
  echo "<td>$row[name]</td>";
  echo "<td>$row[discription]</td>";
  echo "<td>$row[price]</td>";
  echo "<td>$row[catagoeryid]</td>";

  echo "</tr>";
  
echo "</table>";



mysql_close($con);
?>




<h1> Modification is successfull </h1> 

<p><a href="home.php">back to main page</a>
</p>



</body>
</html> 

