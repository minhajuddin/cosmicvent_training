<html>
 <head>
    <title>
   COMPOSE MAIL
    </title>
    <link type="text/css" rel="stylesheet" href="style.css " />
  </head>
  <body>

<div id="header">
       <div id="search" align="right">
           <form action="main.php" method="post">
           <b>Search</b> 
           <input type="text" name="search" value="user name" id="search">
           <input type=submit name=submit value="GO" id=submit>
           </form>
        </div>

       <div id = "heading" align="center">
          <h2>New E-mail Message</h2> 
       </div>
 </div>


<div id ="main_menu_link" align="right">
<a href="index.php"><b>Return to Main Menu</b></a>
</div>

<b>Compose New Email-Message:</b>

<div id ="content">
<form action="send_mail.php" method="post">
<label for="fromid">From :</lable> &nbsp &nbsp &nbsp <input type="text" id="fromid" name="fromid" size="100"/><br/>
</br>
<label for="subject">Subject :</lable> &nbsp <input type="text" id="subject" name="subject" size="101" /><br/>
</br>
Body :&nbsp <br> <textarea rows=12 cols=84 id="mbody" name="mbody"></textarea><br/>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" value="Send"> &nbsp <input type="reset" value="Discard">
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