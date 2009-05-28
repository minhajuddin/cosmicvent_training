

<html>
 <head>
  <title>-- Send Mail</title>
  <link type="text/css"
 </head>

 <body>
 
 <div class="header">
 </div>
 
 <a href="index.php"> Home </a><span>-></span><a href="compose_mail.php"> Compose Mail </a>
 
 <div class="body">
 
 <?PHP
 
 if(isset($_POST['fromid']))
 {
      $from = $_POST['fromid'];
     // $headers = "From:".$from ;
      $subject = $_POST['subject'];
      $message = $_POST['mbody'];
      
 echo "
 <h2> Mail preview</h2>
 <p1> From : $from</p1><br/>
 <p1> Subject: $subject</p1><br/
 <p1> Message: <br/>$message</p1> 
 
 
 
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
     
    }
        
?> 