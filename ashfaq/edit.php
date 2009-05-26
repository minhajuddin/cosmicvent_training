<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>this is existing products</title> 
<link type="text/css" rel="stylesheet" href="" />
<style type="text/css">
<!--
a:link {color: #000000; text-decoration: underline; }
a:active {color: #0000ff; text-decoration: underline; }
a:visited {color: #008000; text-decoration: underline; }
a:hover {color: #ff0000; text-decoration: none; }
-->
</style> 
</head>

<body bgcolor=#20b2aa>


<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_ash", $con);


$result = mysql_query("SELECT * FROM catalogue WHERE id='$_POST[id]'");

echo "<table border='1'>
<tr>
<th>id</th>
<th>name</th>
<th>discription</th>
<th>price</th>

</tr>";
$row = mysql_fetch_array($result);
  


echo "<form action='modify1.php' method='post'>";
  echo "<tr>";
  echo "<td><input type='hidden' name='id' value='$row[id] '/></td>";
  echo "<td><input type='text' name='name' value='$row[name]' /></td>";
  echo "<td><input type='text' name='discription' value=' " . $row['discription'] ."' /> </td>";
  echo "<td><input type='text' name='price' value='  ". $row['price'] ."' /></td>";
  echo "<td><input type='text' name='catagoeryid' value='  ". $row['catagoeryid'] ."' /></td>";

  echo "</tr>";
  
echo "</table>";

echo "<input type='submit' value='update'  />";
echo "</form>";
mysql_close($con);
?>





<p><a href="home.php"><b>back to main page</b></a>

</p>



</body>
</html> 

