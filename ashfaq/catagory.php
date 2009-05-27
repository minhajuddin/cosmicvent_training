



<html>
<head><title>add cat></title></head>

<body>

<?php

$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("my_ash", $con);


$result = mysql_query("SELECT * FROM catagoery");




mysql_select_db("my_ash", $con);


 


$sql="INSERT INTO catagoery (cid,cname)
VALUES
('$_POST[cid]','$_POST[cname]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "";

mysql_close($con)
?> 

<a href="home.php">back to home</a>
</body>
</html>
