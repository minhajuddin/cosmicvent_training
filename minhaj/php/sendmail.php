<?php
  $to = "minhajuddin@cosmicvent.com";
  $from = "minhauddin.k@gmail.com";
  $subject = "Test mail from PHP";
  $body = "Test mail from PHP, body of the mail";
  
  echo "Result " . mail($to, $subject, $body, "From:" . $from) . "*";
?>