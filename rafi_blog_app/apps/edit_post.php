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

mysql_select_db("my_blog_db", $con);
$temp=$_GET['title'];

$result = mysql_query("SELECT * FROM Bloginfo WHERE postID='$temp'");
$res =  mysql_fetch_array($result);
 
  
  echo " <div class='comid'><form action='core_edit_blog.php' method ='POST'>


<label for='Title'>Title</label><br/>
<input type='text' name='Title' value='$res[Title]'><br/>
<input type='hidden' name='postID' value='$res[postID]'> <br/>


<label for='Comments'>Post</label><br/>
<textarea 
 name='Comments' rows='10' cols='48' >$res[Comments]</textarea></td><br/>



<input type='submit' value='Post'>&nbsp<input type='reset' value='Reset'>
 

</form> </div>";
  


mysql_close($con);

?> 

</body>
</html>