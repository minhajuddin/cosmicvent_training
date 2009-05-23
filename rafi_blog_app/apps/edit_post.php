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
$temp=$_GET['title'];

$result = mysql_query("SELECT * FROM Bloginfo WHERE Title='$temp'");
$res =  mysql_fetch_array($result);
 
  
  echo " <form action='core_edit_blog.php' method ='POST'>

<table border='1' >

<tr>
<th>Title</th>
<td><input type='text' name='Title' value='$res[Title]'>
<input type='hidden' name='postID' value='$res[postID]'></td>
</tr>
<tr>
<th>Post</th>
<td><textarea 
 name='Comments' rows='10' cols='48' >$res[Comments]</textarea></td>
</tr>
<tr>
<th></th>
<td><input type='submit' value='Post'>&nbsp<input type='reset' value='Reset'></td>
 
</tr>
</table>
</form> ";
  


mysql_close($con);
?> 
<br/><br/>
<a href="../index.php"> Go Back to Home Page</a>

</body>
</html>