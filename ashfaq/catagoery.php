<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>ADD CATAGOERY</title> 
<link type="text/css" rel="stylesheet" href="design.css" />
</head>



<body>


<form action="catagory.php" method="post">

<table class="mytable">

<tr>
<th align="right">CNAME:</th>

<td align="left"><input type="text" name="cname" value="" size="30"></td</tr>

<td align="right">

<input type="submit" value="submit" "> &nbsp

</td><td align="left">

<input type="reset" value="reset" >

</td> </tr>


</table>

</form> 

<hr>
<form action="catagoery.php" method="post">
<h3>
Enter the name of the product which you want to delete :
</h3>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_ash", $con);


mysql_query("DELETE FROM catagoery WHERE cname='$_POST[cname]'");

mysql_close($con);
?> 
<input type="text" name="cname" value="" ></br>
<input type="submit"  value="delete" >
</form>



<hr>
<br>

<a href="home.php"><b>Go back to main menu</b></a>


</body>
</html>