<html>
  <head>
    <title>Template</title>
    <link type="text/css" rel="stylesheet" href="home.css">
  </head>
  <body>
  
  <div class= "wrapper">
  
  
          <!-- hader -->
  
  
  <div class="header">
      <div class="logo">Cosmicvent</div>
      <div class = "logo-text">Emailer</div>
  </div>
      
          <!-- navigation bar -->
      
      
      <div class="navbar"> 
      <a href="home.php"> Home </a> &nbsp &nbsp
      <a href="updatedb.php"> update DB </a> &nbsp &nbsp
      <a href="home"> Search DB </a> &nbsp &nbsp
      </div>
      
      
          <!-- PAGE -->
      
      <div class = " page" >
      
      <form action="home.php" method="post">
<label for="fromid" >From Id</label> <input type="text" id="fromid" name="fromid"/><br/><br/>
<label for="subject" >Subject  </label> <input type="text" id="subject" name="subject"/><br/><br/>

<label for="mbody">Message</label><br/> 
<textarea  id="mbody" name="mbody" rows="20" cols="68" >
</textarea><br/><br/>
<input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset">
</form>

<!-- Handler to compose mail -->

<?PHP
 
 if(isset($_POST['fromid']))
 {
      $from = $_POST['fromid'];
     // $headers = "From:".$from ;
      $subject = $_POST['subject'];
      $message = $_POST['mbody'];
      
      
      
      
      if( (0==strlen($from)) || ( 0 == strlen($subject) ) || ( 0 == strlen($message) )) {
    echo " <h3> Enter from ID , subject and message </h3> <br/> <a href='compose_mail.php'>Compose Mail</a>";
    die();
    }
      
 echo "
 <h2> Mail preview</h2>
 <p1> <h3>From : </h3>$from</p1>
 <p1> <h3> Subject: </h3> $subject</p1>
 <p1> <h3> Message:</h3> <br/>$message</p1> 
 
 
 
 <form action='home.php' method='post'>
 <input type='hidden' name='sendid' value=1 />
 <input type='hidden' name='fromid' value='$from' />
 <input type='hidden' name='subject' value='$subject' />
 <input type='hidden' name='mbody' value='$message' />
 <input type='submit' value='Submit'>
 
 </form>";
 
 
 }
 
 
 ?>
 
 
 <!-- Handler for send mail -->
 
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
      
      
      
       </div>
      
      
          <!-- footer -->
      
      <div class = "footer">Cosmicvent &copy; 2009 </div>
      
  </div>
  
  </body>
  
  </html>
      