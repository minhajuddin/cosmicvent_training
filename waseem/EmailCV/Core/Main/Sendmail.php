<?php
include '../DataAccess/MySQLDA.php';
include '../Classes/User.php';
include '../Classes/Mail.php';
include '../Functions.php';

$from = $_POST["from"];
$subject = addslashes($_POST["subject"]);
$message = $_POST["message"];

$mail = new Mail($from, $subject, $message);

//Check if there is any error in the form and redirect accordingly
if(!validEmail($from) || $subject == "" || $message == "")
	header("Location: ../../index.php?form=true");

//Create an object of the data class and get all the active users
$da = new MySQLDA;
$users = $da->getActiveUsers();

//Send the mail actually
$error = false;
foreach($users as $user)
{
	if(!$mail->send($user))
		$error = true;
}

if($error == true)
	header("Location: ../../index.php?error=true");
else
	header("Location: ../../index.php?success=true");
?>