

<html>
 <head>
  <title>-- Send Mail</title>
  <link type="text/css" rel="stylesheet" href="index.css" />
 </head>

 <body>
 
 <div class="header" > <div class ="strip"> <h1> Email Send Utility </h1> </div> </div>
 
 
 
 <div class="mesbody">
 
 <?PHP
 
 if(isset($_POST['fromid']))
 {
      $from = $_POST['fromid'];
     // $headers = "From:".$from ;
      $subject = $_POST['subject'];
      $message = $_POST['mbody'];
      
 echo "
 <h2> Mail preview</h2>
 <p1> <h3>From : </h3>$from</p1>
 <p1> <h3> Subject: </h3> $subject</p1>
 <p1> <h3> Message:</h3> <br/>$message</p1> 
 
 
 
 <form action='send_mail.php' method='post'>
 <input type='hidden' name='sendid' value=1 />
 <input type='hidden' name='fromid' value='$from' />
 <input type='hidden' name='subject' value='$subject' />
 <input type='hidden' name='mbody' value='$message' />
 <input type='submit' value='Submit'>
 
 </form>";
 
 
 }
 
 
 ?>
 
 
 
 
 </div>
<div class="sidebar"><a href="index.php"> Home </a><span><br/></span><a href="compose_mail.php"> Compose Mail </a></div>

</body>
</html>





<?php


require_once 'data_access/email_repo.php';
  
  if(isset($_POST['sendid']))
  
  {
  
  $from = $_POST['fromid'];
  $headers = "From:".$from;
  $subject = $_POST['subject'];
  $message = $_POST['mbody'];
  
  
  $mail_repo = new EmailRepo();
  $mailids = $mail_repo->get_mailids();


if(!$mailids)
{
echo " <h3> There are no existing mailid entries </h3> ";
}
else
{
   
   $to = $from ;
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
     header('location: compose_mail.php');
    }
        
?> 