<html>
 <head>
    <title>
-- Send mail
    </title>
    <link type="text/css" rel="stylesheet" href="new.css" />
  </head>
  <body>
  
  <div class="wrapper">
<div class="header" > 
<div class ="logo-text">  Emailer  </div> 
<div style="clear:both;"></div>
</div>


<div class="content" >


<div class="comp-navbar">
<a href="index.php">  <br/> <br/>Home </a>
</div>

<div  class="comp-page">


<form action="send_mail.php" method="post">
<label for="fromid">From Id</label> <input type="text" id="fromid" name="fromid"/><br/><br/>
<label for="subject">Subject </label> <input type="text" id="subject" name="subject"/><br/><br/>

<label for="mbody">Message</label><br/> 
<textarea  id="mbody" name="mbody" rows="10" cols="48" >
</textarea><br/>
<input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset">
</form>



</div>
<div style="clear:both;"></div>
</div>



<div class ="footer"> Cosmicvent &copy; 2009</div>



</div>

</body>
</html>