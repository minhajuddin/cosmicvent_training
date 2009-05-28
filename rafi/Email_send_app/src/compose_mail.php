<html>
 <head>
    <title>
-- Send mail
    </title>
    <link type="text/css" rel="stylesheet" href="index.css" />
  </head>
  <body>
<div class="header" > <div class ="strip"> <h1> Email Send Utility </h1> </div> </div>





<div class="mesbody">


<form action="send_mail.php" method="post">
<label for="fromid">From Id</label> <input type="text" id="fromid" name="fromid"/><br/><br/>
<label for="subject">Subject </label> <input type="text" id="subject" name="subject"/><br/><br/>

<label for="mbody">Message</label><br/> 
<textarea  id="mbody" name="mbody" rows="20" cols="68" >
</textarea><br/>
<input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset">
</form>



</div>
<div class ="sidebar">

<a href="index.php"> <h3> Home </h3></a>

</div>
<div id ="footer"></div>





</body>
</html>