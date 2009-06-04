<?php
session_start();
include '../DataAccess/MySQLDA.php';

$name = $_POST["name"];
$name = strtolower($name);
$pass = $_POST["pass"];

$da = new MySQLDA;
if($da->adminExists($name, $pass))
{
	$_SESSION["name"] = $name;
	header("Location: ../../index.php");
}
else
	header("Location: ../../login.php?name=$name");
?>
