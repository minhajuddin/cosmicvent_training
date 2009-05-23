<!DOCTYPE html
      PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>My Blog Post Site</title>
</head>

<body>

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_blog_db", $con);

$result = mysql_query("SELECT * FROM Bloginfo WHERE Title='$_GET[title]'");

 echo "<table border='1'>
<tr>
<th>Title:</th>
<td>$result['Title']</td>
</tr>";
  
  echo "<tr>";
  echo "<td>" ."</td>";
  echo "<td>" . $result['Comments'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  
  echo "<th>Author Name:</th>";
  echo "<td>$result['AuthName'] &nbsp $result['TimeStamp']</td>";
  echo "</tr>";
  
echo "</table>";

mysql_close($con);
?> 
<br/><br/>
<a href="../index.php"> Go Back to Home Page</a>

</body>
</html>