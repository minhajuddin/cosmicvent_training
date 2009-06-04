<?php


/**
 * This is the Mail class. It creates a Mail that can be sent to any number of Users
 *
 * @author AbdulSattar
 */
class Mail {
	private $from;
	private $subject;
	private $message;
	
	private $eSubject;
	private $eMessage;

	var $userId = "[__user_id__]";
	var $userName = "[__user_name__]";
	var $userEmail = "[__user_email__]";
	var $userActive = "[__user_active__]";

	var $htId = "[&#95;&#95;user&#95;id&#95;&#95;]";
	var $htName = "[&#95;&#95;user&#95;name&#95;&#95;]";
	var $htEmail = "[&#95;&#95;user&#95;email&#95;&#95;]";
	var $htActive = "[&#95;&#95;user&#95;active&#95;&#95;]";

	public function __construct($from, $subject, $message)
	{
		$this->from = $from;
		$this->subject = $subject;
		$this->message = $message;
	}

	public function escape($user)
	{
		$this->eSubject = str_ireplace($this->userId, $user->id, $this->subject);
		$this->eSubject = str_ireplace($this->userName, $user->name, $this->eSubject);
		$this->eSubject = str_ireplace($this->userEmail, $user->email, $this->eSubject);
		$this->eSubject = str_ireplace($this->userActive, $user->active, $this->eSubject);

		$this->eMessage = str_ireplace($this->htId, $user->id, $this->message);
		$this->eMessage = str_ireplace($this->htName, $user->name, $this->eMessage);
		$this->eMessage = str_ireplace($this->htEmail, $user->email, $this->eMessage);
		$this->eMessage = str_ireplace($this->htActive, $user->active, $this->eMessage);
	}

	public function send($user)
	{
		$this->escape($user);

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: ' . $this->from;

		return mail($user->email, $this->eSubject, $this->eMessage, $headers);
	}
}
?>