<html>
 <head>
    <title>
-- Home
    </title>
    <link type="text/css" rel="stylesheet" href=" " />
  </head>

      
<body>

<div id ="header"></div>
<a href="send_mail.php"> Send mail </a>

<div id ="sidebar">
</div>
<div id ="content">
<form action="index.php" method="post">
<lable for="uname">User Name <br/> <input type="text" id="uname" name="username"/></lable><br/>
<lable for="mailid">Email ID<br/> <input type="text" id="mailid" name="mailid"/></lable><br/>
<input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset">
</form>
</div>
<div id ="footer"></div>

<?php
$mail_repo = new EmailRepo();
$mailids = $mail_repo->get_mailids();



if(!$mailids)
{
echo " <h3> There are no existing mailid entries </h3> ";
}
else
{

 //loop through them
 foreach( $mailids as $mailid ){
echo "$mailid->user_name &nbsp &nbsp $mailid->email_id <br/>";
        }
        }
?>
<?php
  
  require_once 'data_access/email_class.php';
  
  if(isset($_POST['mailid'])){
      //insert the post
      $username = $_POST['username'];
      $mailid = $_POST['mailid'];
      
   $escp_username =    mysql_escape_string($username);
    $escp_mailid =  mysql_escape_string($mailid);
      
      $mailid = new MailEntry(0, $escp_username, $escp_mailid);
      $mail_repo = new EmailRepo();
      
      $result = $mail_repo->insert_mailid( $mailid );
      
      if( $result ){
      //  echo "Entry inserted  successfully";
      } else {
        echo "Mail insertion failed";
      }
      
      }
      
      ?>


</body>
</html>