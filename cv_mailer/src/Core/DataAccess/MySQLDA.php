<?php

 /**
 * MySQLDA is the MySQL DataAccess class of this application
 *
 * @author AbdulSattar
 */
class MySQLDA {
	private $con;
	private $host = "localhost";
	private $database = "emailcv";
	private $user = "root";
	private $pass = "";

	function __construct()
	{
		$con = mysql_connect($this->host, $this->user, $this->pass);
		mysql_select_db($this->database);
	}

	function getUsers()
	{
		$result = mysql_query("SELECT * FROM users");
		$i = 0;
		while($row = mysql_fetch_array($result))
		{
			$users[$i] = new User($row["Id"], $row["Name"], $row["Email"], $row["Active"]);
			$i++;
		}

		return $users;
	}

	function getActiveUsers()
	{
		$result = mysql_query("SELECT * FROM users WHERE Active=1");
		$i = 0;
		while($row = mysql_fetch_array($result))
		{
			$users[$i] = new User($row["Id"], $row["Name"], $row["Email"], $row["Active"]);
			$i++;
		}

		return $users;
	}

	function getInactiveUsers()
	{
		$result = mysql_query("SELECT * FROM users WHERE Active=0");
		$i = 0;
		while($row = mysql_fetch_array($result))
		{
			$users[$i] = new User($row["Id"], $row["Name"], $row["Email"], $row["Active"]);
			$i++;
		}

		return $users;
	}

	function getTemplates()
	{
		$result = mysql_query("SELECT * from templates");
		$templates = array();
		while($row = mysql_fetch_array($result))
		{
			$templates[$row["Name"]] = $row["Message"];
		}

		return $templates;
	}

	function addUser($user)
	{
		return mysql_query("INSERT INTO users(Name,Email) VALUES('$user->name', '$user->email')");
	}

	function searchUsers($query)
	{
		$result = mysql_query("SELECT * FROM users WHERE Email LIKE '%$query%' OR Name LIKE '%$query%'");
		$users = array();
		while($row = mysql_fetch_array($result))
			array_push($users, new User($row["Id"], $row["Name"], $row["Email"], $row["Active"]));
		return $users;
	}

	function editUser($user)
	{
		if($user->active == "Inactive")
			$active = 0;
		else
			$active = 1;
		return mysql_query("UPDATE users SET Name = '$user->name', Email = '$user->email', Active = '$active' WHERE Id=$user->id");
	}

	function getUserById($id)
	{
		$result = mysql_query("SELECT * FROM users WHERE Id=$id");
		$row = mysql_fetch_array($result);
		return new User($row["Id"], $row["Name"], $row["Email"], $row["Active"]);
	}

	function saveTemplate($name, $message)
	{
		$name = addslashes($name);
		$message = addslashes($message);

		return mysql_query("INSERT INTO templates(Name,Message) VALUES('$name', '$message')");
	}

	function adminExists($name, $pass)
	{
		$name = addslashes($name);
		$name = strtolower($name);
		$pass = addslashes($pass);
		$result = mysql_query("SELECT * FROM admin WHERE Name='$name' AND Pass='$pass'");
		if(mysql_num_rows($result) == 1)
			return 1;
		else
			return 0;
	}

	function addAdmin($name, $pass)
	{
		$name = addslashes($name);
		$name = strtolower($name);
		$pass = addslashes($pass);
		return mysql_query("INSERT INTO admin (Name, Pass) VALUES ('$name','$pass')");
	}

	function changeAdminPass($name, $pass)
	{
		$pass = addslashes($pass);
		$name = addslashes($name);
		$name = strtolower($name);
		
		return mysql_query("UPDATE admin SET Pass='$pass' WHERE Name='$name'");
	}
}
?>