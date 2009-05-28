<html>
 <head>
    <title>
-- Home
    </title>
    <link type="text/css" rel="stylesheet" href=" " />
  </head>

      
<body>

<?php

// require_once 'data_access/email_class.php';
if(isset($_POST['mailid'])){


require_once 'data_access/email_class.php';
$mail_repo = new EmailRepo();
        
        
        $username = $_POST['username'];
      $mailid = $_POST['mailid'];
      $id = $_POST['id'];
      $enable_status = $_POST['enablestate'];
      
   $escp_username =    mysql_escape_string($username);
    $escp_mailid =  mysql_escape_string($mailid);
      
      $mailid = new MailEntry($id, $escp_username, $escp_mailid,$enable_status);
      $mail_repo = new EmailRepo();
      
      $result = $mail_repo->update_by_id( $mailid );
      
      if( $result ){
      header('Location: index.php');
      } else {
        echo "Mail insertion failed";
      }
      
      }

        ?>



<?php


if(isset($_GET['id'])){

require_once 'data_access/email_class.php';

$mail_repo = new EmailRepo();
        

        $mailid = $mail_repo->get_mailid_by_id($_GET['id']);
        
        ?>
        
        <div id ="content">
<form action="edit_entry.php" method="post">


<?php 

echo "<lable for='uname'>User Name <br/> <input type='text' id='uname' name='username' value='$mailid->user_name'/></lable>
<br/>
<lable for='mailid'>Email ID<br/> <input type='text' id='mailid'name='mailid' value='$mailid->email_id'/></lable>
<br/>
<input type='hidden' name='id' value='$mailid->id' /> 
<input type='hidden' name='enablestate' value='$mailid->enable_status' />";
?>

<input type="submit" value="Submit"> &nbsp<input type="reset" value="Cancel">
</form>
</div>

<?php } ?>


</body>
</html>