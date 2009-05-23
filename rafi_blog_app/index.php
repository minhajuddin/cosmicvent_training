<!DOCTYPE html
      PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>My Blog Post Site</title>
</head>

<body>
<h1> Welcome to Blog Post</h1><br/><br/>
<h2> Top 30 blog posts </h2>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$sel = mysql_select_db("my_blog_db", $con);

if (!$sel)
  {
  echo "<h2> There are no existing posts</h2>";
  
  }
else{
$result = mysql_query("SELECT * FROM Bloginfo ORDER BY postID DESC");


 while($row = mysql_fetch_array($result))
  {
   $temp = $row['Title'];
   
  echo "Title  : &nbsp<a href='apps/display_post.php?title=$temp'>$temp</a>
   &nbsp 
  <a href='apps/edit_post.php?title=$temp'> Edit </a> 
  &nbsp
  <a href='apps/delete_post.php?title=$temp'> Delete </a>
  <br/><br/>";
  
    } 
}
mysql_close($con);
?> 

<p> Post a new Comment <a href="html/blogpost.html"> Here </a> </p>
</body>

</html>
