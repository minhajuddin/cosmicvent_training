<?php
include '../DataAccess/MySQLDA.php';

$name = $_GET["name"];
$message = $_GET["message"];

$da = new MySQLDA;

$templates = $da->getTemplates();
if(array_key_exists($name, $templates))
echo "A template with the name exists. Chose a different name.";
else
{
	if($da->saveTemplate($name, $message))
	echo "Saved Successfully";
	else
	echo "Error occured while saving";
}
?>