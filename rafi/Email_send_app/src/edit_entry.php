<html>
 <head>
    <title>
-- Home
    </title>
    <link type="text/css" rel="stylesheet" href=" index.css" />
  </head>

      
<body>

<div class="header" > <div class ="strip"> <h1> Email Send Utility </h1> </div> </div>

<?php

require_once 'data_access/email_repo.php';
if(isset($_POST['mailid'])){



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

require_once 'data_access/email_repo.php';

$mail_repo = new EmailRepo();
        

        $mailid = $mail_repo->get_mailid_by_id($_GET['id']);
        
        ?>
        
        <div class ="mesbody">
<form action="edit_entry.php" method="post">


<?php 




echo "<lable for='uname'>User Name <br/> <input type='text' id='uname' name='username' value='$mailid->user_name'/></lable>
<br/><br/>
<lable for='mailid'>Email ID<br/> <input type='text' id='mailid'name='mailid' value='$mailid->email_id'/></lable>
<br/><br/>

<select name='enablestate' > "; 

if( 0 == $mailid->enable_status)
{
echo "
<option value='1' >Enable</option>
<option value='0' selected = 'true'>Disable</option> ";}
else
{ echo"
<option value='1' selected = 'true'>Enable</option>
<option value='0' >Disable</option> ";
}

echo "
</select><br/><br/>

<input type='hidden' name='id' value='$mailid->id' /> ";

?>

<input type="submit" value="Submit"> &nbsp<input type="reset" value="Cancel">
</form>
</div>

<div class="sidebar"><h3> <a href="index.php"> Home </a> </h3></div>

<?php } ?>


</body>
</html>