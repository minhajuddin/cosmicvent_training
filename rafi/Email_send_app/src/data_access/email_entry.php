<?php
  class MailEntry{
    public $id;
    public $user_name;
    public $email_id;
    public $enable_status;
    
    
    function MailEntry( $id, $user_name, $email_id,$enable_status){
      $this->id = $id;
      $this->user_name = $user_name;
      $this->email_id = $email_id;
      $this->enable_status = $enable_status;
      
    }
  }
?>