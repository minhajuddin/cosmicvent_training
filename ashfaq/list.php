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

$result = mysql_query("SELECT a.*,b.* FROM catalogue a inner join catagoery b on a.catagoeryid=b.cid");

echo "<table border='1'>
<tr>
<th>id</th>
<th>name</th>
<th>discription</th>
<th>price</th>

<th>cname</th>


<th>edit</th>
<th>delete</th>

</tr>";


while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['discription'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";

  echo "<td>" . $row['cname'] . "</td>";


  

  echo "<td>
  
  <form action='edit.php' method='post'>
  <input type='hidden' name='id' value='$row[id] '/>
  <input type='hidden' name='name' value='$row[name]' />
  <input type='hidden' name='discription' value=' " . $row['discription'] ."' />
  <input type='hidden' name='price' value='  ". $row['price'] ."' />
  
  <input type='hidden' name='cname' value='  ". $row['cname'] ."' />  
<input type='submit' value='edit'  />
  </form></td>";
       
  echo "<td>
  <form action='delete.php' method='post'>
  <input type='hidden' name='id' value='$row[id] '/>
  <input type='hidden' name='name' value='$row[name]' />
  <input type='hidden' name='discription' value=' " . $row['discription'] ."' />
  <input type='hidden' name='price' value='  ". $row['price'] ."' />
  
  <input type='hidden' name='cname' value='  ". $row['cname'] ."'
  <input type='submit' value='delete'  />
  </form> </td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?> 
<a href="home.php"><b>back to main page</b></a>

</body>
</html> 

