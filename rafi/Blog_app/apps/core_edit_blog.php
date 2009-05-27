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


$escp_Title = mysql_escape_string($_POST[Title]);
$escp_Comments = mysql_escape_string($_POST[Comments]);

$res = mysql_query("UPDATE Bloginfo SET Title = '$escp_Title',Comments = '$escp_Comments'
WHERE postID = '$_POST[postID]'");
if (!$res)
  {
  die('Could not connect: ' . mysql_error());
  }



mysql_close($con);
header("location: display_post.php?title=$_POST[postID]");
?>