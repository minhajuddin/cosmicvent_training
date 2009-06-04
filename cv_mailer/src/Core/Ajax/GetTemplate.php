<?php
include '../DataAccess/MySQLDA.php';

$name = $_GET["name"];

$da = new MySQLDA;
$templates = $da->getTemplates();

echo $templates[$name];
?>