<?php
include '../Classes/User.php';
include '../DataAccess/MySQLDA.php';
include '../Functions.php';

$id = $_POST["id"];
$name = addslashes($_POST["name"]);
$email = addslashes($_POST["email"]);
$active = $_POST["active"];

if($active == "Active")
	$active = 1;
else
	$active = 0;

if(validEmail($email))
{
	$user = new User($id, $name, $email, $active);
	$da = new MySQLDA;

	
	if($da->editUser($user))
		header("Location: ../../edit.php?id=$id&success=true");
	else
		header("Location: ../../edit.php?id=$id&error=true");
}
else
{
	header("Location: ../../edit.php?id=$id&email=true");
}

?>
