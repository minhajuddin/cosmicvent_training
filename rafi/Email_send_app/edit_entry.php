<html>
 <head>
    <title>
-- Home
    </title>
    <link type="text/css" rel="stylesheet" href=" " />
  </head>

      
<body>
<?php

require_once 'data_access/email_class.php';
if(isset($_GET['id'])){

$mail_repo = new EmailRepo();
        

        $mailid = $mail_repo->get_mailid_by_id($_GET['id']);
        
        ?>
        
        <div id ="content">
<form action="edit_entry.php" method="post">


<?php 

echo "<lable for='uname'>User Name <br/> <input type='text' id='uname' name='username' value='$mailid->user_name'/></lable><br/>
<lable for='mailid'>Email ID<br/> <input type='text' id='mailid'name='mailid' value='$mailid->email_id'/></lable><br/>
<input type='hidden' name='id' value='$mailid->id' />"; 
?>

<input type="submit" value="Submit"> &nbsp<input type="reset" value="Cancel">
</form>
</div>

<?php } ?>


</body>
</html>