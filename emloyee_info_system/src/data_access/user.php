<?php
class User{


   public $user_name;
   public $password;
   public $firstname;
   public $lastname;
   public $gender;
         
    
    function User($user_name,$password,$firstname,$lastname,$gender){
      $this->user_name=$user_name;;
      $this->password=$password;;
      $this->firstname=$firstname;
      $this->lastname=$lastname;
      $this->gender=$gender;
      
      }
      }
      ?>