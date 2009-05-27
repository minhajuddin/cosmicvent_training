<!DOCTYPE html
      PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link type="text/css" rel="stylesheet" href="css/index.css"/>

<title>My Blog Post Site</title>
</head>

<body>
<div id="header">
<img height="100" width="346" alt="Blogger" src="images/logo100.png"/>
</div>
<p><a href="index.php"> Home <a></p>
<h1> Welcome to Blog Post</h1><br/><br/>
<div class="disp">

<h3> Here are the Top 30 Blogs </h3>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$sel = mysql_select_db("my_blog_db", $con);

if (!$sel)
  {
  echo "<h2> Not able to select a DB</h2>";
  
  }

$result = mysql_query("SELECT * FROM Bloginfo ORDER BY postID DESC");

if (!mysql_num_rows($result))
  {
  echo "<h2> There are no blogs exists</h2>";
  
  }

else
{
 while($row = mysql_fetch_array($result))
  {
   $temp = $row['Title'];
   $postid = $row['postID'];
   
  echo "Title  : &nbsp<a href='apps/display_post.php?title=$postid'>$temp</a>
   &nbsp 
  <a href='apps/edit_post.php?title=$postid'> Edit </a> 
  &nbsp
  <a href='apps/delete_post.php?title=$postid'> Delete </a>
  <br/><br/>";
  
    } 

    
}
mysql_close($con);
?> 

<p> <a href="html/blogpost.html"> <span class="cr">CREAT A BLOG </span></a> </p>
</div>
</body>

</html>
