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

 $to = NULL;
 foreach( $mailids as $mailid ){

$to = $to."$mailid->email_id ".",";

        }

      }
      
      $headers = "From:".$_POST['fromid'];
      $subject = $_POST['subject'];
      $message = $_POST['mbody'];
      echo "it is running";
      
     

mail($to, $subject, $message, $headers);
     
    }
        
?> 


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


</body>
</html>