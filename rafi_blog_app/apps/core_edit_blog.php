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

$edi = mysql_select_db("my_blog_db", $con);
if (!$edi)
  {
  die('Could not query: ' . mysql_error());
  }


$res = mysql_query("UPDATE Bloginfo SET Title = '$_POST[Title]',Comments = '$_POST[Comments]'
WHERE postID = '$_POST[postID]'");
if (!$res)
  {
  die('Could not connect: ' . mysql_error());
  }



mysql_close($con);
?> 
<h1> Your post is updated successfully</h1>
<br/><br/>
<a href="../index.php"> Go Back to Home Page</a>

</body>
</html>