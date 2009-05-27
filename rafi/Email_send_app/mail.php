<?php
require_once "Mail.php";

$from = "Sandra Sender <sender@example.com>";
$to = "Ramona Recipient <rafi.ece528@gmail.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = "ssl://smtp.gmail.com";
$port = "587";
$username = "rafi.ece528@gmail.com";
$password = "teamf1rafi";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => false,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<p>Message successfully sent!</p>");
 }
?>
