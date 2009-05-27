

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_blog_db", $con);



$TimeStamp=date("Y/m/d");
$escaped_item = mysql_escape_string($_POST[text]);
$esc_usr=mysql_escape_string($_POST[user]);

$sql="INSERT INTO Ucomments (UserName, TitleComm,CommTimeStamp,TitleCommId)
VALUES ('$esc_usr','$escaped_item','$TimeStamp','$_POST[Titeinfo]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }






mysql_close($con);
header("location: display_post.php?title=$_POST[Titeinfo]");
?> 


