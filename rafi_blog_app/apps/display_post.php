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

$query = "SELECT * FROM Bloginfo WHERE postID='$_GET[title]'";
$result = mysql_query($query);
$rs = mysql_fetch_array($result);

 echo " <div class='disp'>
 
  
  <span class='hf'>Title:  &nbsp  $rs[Title] </span>
  
  <div id='discom'>
  $rs[Comments]
  </div>
  
  
  
 <span class='hf'> Author Name:  $rs[AuthName], &nbsp Date:$rs[TimeStamp] </span>
  
  
  
 </div> ";
 
 $query = "SELECT * FROM Ucomments WHERE TitleCommId='$_GET[title]'";
 $result1 = mysql_query($query);
 
 if (!$result1)
  {
 /* die('Could not connect: ' . mysql_error());*/
 echo "<h1> NO comments availabel</h1>";
  }
 else
 {
 while($row = mysql_fetch_array($result1))
  {
  echo " <div class='disp'>
 
  
  <span class='hf'>User:  &nbsp  $row[userName] </span>
  
  <div id='discom'>
  $row[TitleComm]
  </div>
  
  
  
 <span class='hf'> Date:$row[CommTimeStamp] </span>
  
  
  
 </div> ";
 }
  
}
mysql_close($con);
?> 

<div class="comid">

<form action="comment_post.php" method="post" >

<lable for='author' > Name: </lable>
<br/>

<input id="author" name="user" tabindex="1"/>
<?php echo "<input type='hidden' name='Titeinfo' value='$rs[postID]' />"; ?>
<br/>
<br/>

<label for="text">Your comments:</label>
<br/>
<textarea id="text" cols="70" rows="11" name="text" tabindex="4"/></textarea>
<br/>
<input type="submit" value=" Post " name="post" style="font-weight: bold;" tabindex="5"/>
<br/>
<br/>
</form>
</div>



<br/><br/>
<a href="../index.php"> Go Back to Home Page</a>

</body>
</html>