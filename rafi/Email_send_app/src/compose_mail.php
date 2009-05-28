<html>
 <head>
    <title>
-- Send mail
    </title>
    <link type="text/css" rel="stylesheet" href="index.css" />
  </head>
  <body>
<div class="header" > <div class ="strip"> <h1> Email Send Utility </h1> </div> </div>





<div class="body">


<form action="send_mail.php" method="post">
<lable for="fromid">From Id</lable><br/> <input type="text" id="fromid" name="fromid"/><br/>
<lable for="subject">Subject </lable><br/> <input type="text" id="subject" name="subject"/><br/>

<lable for="mbody">Message</lable><br/> 
<textarea  id="mbody" name="mbody" rows="10" cols="48" >
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