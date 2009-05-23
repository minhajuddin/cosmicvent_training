<!DOCTYPE html
      PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>My Blog Post Site</title>
</head>

<body>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_blog_db", $con);
echo "$_GET[title]";
$query = "SELECT * FROM Bloginfo WHERE Title='$_GET[title]'";
$result = mysql_query($query);
$rs = mysql_fetch_array($result);
echo $rs['Title'];
 
 echo " <table border='1'> 
 
  <tr>
  <td>Title:</td>
  <td> $rs[Title] </td>
  </tr>
  
  <tr>
  <td></td>
  <td>$rs[Comments]</td>
  </tr>
  
  <tr>  
  <th>Author Name:</th>
  <td>$rs[AuthName] &nbsp $rs[TimeStamp]</td>;
  </tr>
  
 </table> ";

mysql_close($con);
?> 
<br/><br/>
<a href="../index.php"> Go Back to Home Page</a>

</body>
</html>