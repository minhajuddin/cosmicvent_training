<?php
/**
 * The User class represents a user.
 *
 * @author AbdulSattar
 */
class User {
	var $id;
	var $name;
	var $email;
	var $active;

	function __construct($id = 0, $name = "No Name", $email = "No Email", $active = 0)
	{
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$active == "1" ? $this->active = "Active" : $this->active = "Inactive";
	}
}
?>