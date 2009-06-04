<?php
include '../DataAccess/MySQLDA.php';

$da = new MySQLDA;

if(isset($_POST["name"])&&isset($_POST["pass"]))
{
	if($da->addAdmin($_POST["name"], $_POST["pass"]))
		header("Location: ../../admin.php?success=new");
	else
		header("Location: ../../admin.php?error=new");
}
else if(isset($_POST["currentname"])&&isset($_POST["currentpass"])&&isset($_POST["newpass"])&&isset($_POST["confirmpass"]))
{
	if($da->adminExists($_POST["currentname"], $_POST["currentpass"])&&($_POST["newpass"] == $_POST["confirmpass"]))
	{
		if($da->changeAdminPass($_POST["currentname"], $_POST["newpass"]))
			header("Location: ../../admin.php?success=pass");
		else
			header("Location: ../../admin.php?error=pass");
	}
	else
		header("Location: ../../admin.php?error=pass");
}
else
	header("Location: ../../admin.php?error=true");
?>