<html>
  <head>
    <title>Template</title>
    <link type="text/css" rel="stylesheet" href="home.css">
  </head>
  <body>
  
  <div class= "wrapper">
  
  
          <!-- hader -->
  
  
  <div class="header">
      <div class="logo"></div>
      <div class = "logo-text"> Cosmicvent Emailer</div>
  </div>
      
          <!-- navigation bar -->
      
      
      <div class="navbar"> 
      <a href="home.php"> Home </a> &nbsp &nbsp
      <a href="updatedb.php"> Add User</a> &nbsp &nbsp
      <a href="searchdb.php"> Search</a> &nbsp &nbsp
      </div>
      
      
          <!-- PAGE -->
      
      <div class = " page" >
      
     
      
      <!-- Handler for send mail -->
 
 <?php


require_once 'data_access/email_repo.php';
  
  if(isset($_POST['sendid']))
  
  {
  
  $from = $_POST['fromID'];
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
        
      echo " <span style= 'color :green'> 	Your message has been sent Successfully </span> <br/><br/>";

  }    
 //    header('location: home.php');
    }
        
        ?>
        
        
        
        
  <?php
  
  // Handler to compose mail 
   if(isset($_POST['fromid']))
 {
     
       echo " i am inpost";


      $from = $_POST['fromid'];
     // $headers = "From:".$from ;
      $subject = $_POST['subject'];
      $message = $_POST['mbody'];
      
      
      
      
      if( (0==strlen($from)) || ( 0 == strlen($subject) ) || ( 0 == strlen($message) )) {
      
 echo "     <form action='home.php' method='post'>
<label for='fromid' >From Id</label> <input style='width: 300px' type='text' id='fromid' name='fromid'/><br/><br/>
<label for='subject' >Subject  </label> <input style='width: 450px' type='text' id='subject' name='subject'/><br/><br/>

<label for='mbody'>Message</label><br/> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<textarea  id='mbody' name='mbody' rows='20' cols='68' >
</textarea><br/><br/>
<input type='submit' value='Submit'> &nbsp <input type='reset' value='Reset'>
</form> ";

    echo " <p><span style='color : red'> Enter from ID , subject and message </span></p> ";
    
    }
      
      else {
 echo "
 <h2> Mail preview</h2>
 <p1 id='preview'> From : $from <br/><br/>
  Subject:  $subject <br/><br/>
  Message: <br/> <br/> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
  $message</p1> <br/><br/>
 
 
 
 <form action='home.php' method='post'>
 <input type='hidden' name='sendid' value=1 />
 <input type='hidden' name='fromID' value='$from' />
 <input type='hidden' name='subject' value='$subject' />
 <input type='hidden' name='mbody' value='$message' />
 <input type='submit' value='Submit'>
 
 </form>"; }
 
 
 }
 
 else {
 ?>
 
  <!-- Mail form -->
  
  
 <form action="home.php" method="post">
<label for="fromid" >From ID</label> <input style='width: 300px' type="text" id="fromid" name="fromid"/><br/><br/>
<label for="subject" >Subject &nbsp</label> <input style='width: 450px' type="text" id="subject" name="subject"/><br/><br/>

<label for="mbody">Message</label><br/> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<textarea  id="mbody" name="mbody" rows="20" cols="68" >
</textarea><br/><br/> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset">
</form>

<?php } ?>
 
  
 
      
      
       </div>
      
      
          <!-- footer -->
      
      <div class = "footer">Cosmicvent &copy; 2009 </div>
      
  </div>
  
  </body>
  
  </html>
      