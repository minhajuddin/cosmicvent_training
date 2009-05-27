<?php
  $to = "minhajuddin@cosmicvent.com";
  $from = "minhajuddin@mailinator.com";
  $body = "Test mail from PHP";
  $subject = "Test mail PHP SUBJECT";
  
  echo "sending .. " .mail( $to, $subject, $body, "From: $from");
?>