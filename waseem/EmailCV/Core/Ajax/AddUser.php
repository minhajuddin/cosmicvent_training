<?php
include '../Classes/User.php';
include '../DataAccess/MySQLDA.php';
include '../Functions.php';

$name = addslashes($_GET["name"]);
$email = addslashes($_GET["email"]);

if(!validEmail($email))
echo "Invalid Email";
else
{
	$user = new User(0, $name, $email, 1);
	$da = new MySQLDA;
	if($da->addUser($user))
	echo "Added Successfully";
	else
	echo "Error occured while adding the user";
}
?>
