<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html> 
<head> 

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>ADD PRODUCT</title> 

</head>

<body>

<form action="add.php" method="post">

 <table class="mytable">

<tr><th  colspan="2">
<h1>Please fill the product details </th></tr>
<tr>

<tr>
<th align="right">ID: </th>
<td align="left"> <input type="text" name="id" value="" size="30"></td></tr>

<tr>
<th align="right">NAME:</th>
<td align="left"><input type="text" name="name" value="" size="30"></td</tr>

<tr>
<th align="right">DISCRIPTION:</th>
<td align="left"> <textarea rows = 6 cols = 23 name="discription" value="" ></textarea></td></tr>

<tr>
<th align="right">PRICE:</th>
<td align="left"><input type="text" name="price" value="" size="30" ></td></tr>

<tr>
<th align="right">catagoeryid:</th>
<td> 
<?php

$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("my_ash", $con);

$result = mysql_query("SELECT * FROM catagoery");

mysql_close($con)
?> 

<?php
echo "<select name='catagoeryid'  width=90>";

while($row = mysql_fetch_array($result))
{

  echo "<option value='$row[cid]'>$row[cname]</option>";
  }
      
  echo  "</select>";
  
  ?>

</td></tr>

</tr>

<tr>
<td align="right">
<input type="submit" value="submit" "> &nbsp
</td><td align="left">
<input type="reset" value="reset" >

</td> </tr>
</table>


</form> 
</body>

</html>


