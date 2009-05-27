<html>
 <head>
    <title>
-- Send mail
    </title>
    <link type="text/css" rel="stylesheet" href=" " />
  </head>
  <body>
<div id ="header"> <a href="index.php"> Home </a></div>



<div id ="sidebar">



</div>

<div id ="content">


<form action="send_mail.php" method="post">
<lable for="fromid">From Id</lable><br/> <input type="text" id="fromid" name="fromid"/><br/>
<lable for="subject">Subject </lable><br/> <input type="text" id="subject" name="subject"/><br/>
<lable for="mbody">Message</lable><br/> <textarea  id="mbody" name="mbody"></textarea><br/>
<input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset">
</form>

</div>

<div id ="footer"></div>

<?php


require_once 'data_access/email_class.php';
  
  if(isset($_POST['fromid']))
  
  {
  
  $mail_repo = new EmailRepo();
$mailids = $mail_repo->get_mailids();


if(!$mailids)
{
echo " <h3> There are no existing mailid entries </h3> ";
}
else
{

 
 
      $headers = "From:".$_POST['fromid'];
      $subject = $_POST['subject'];
      $message = $_POST['mbody'];
      
   
   $to = $_POST['fromid'] ;
   mail($to, $subject, $message, $headers) ;  
      
      
 foreach( $mailids as $mailid )
        {
 
  $to = $mailid->email_id ;
 // echo "$to <br/>";
 //echo "result".
  mail($to, $subject, $message, $headers) ;
 
         }
        
      echo " <h2 style= 'color :green'> 	Your message has been sent</h2> ";

  }    
     
    }
        
?> 



</body>
</html>