<?php

// Artist class defination

  class Artist{
    public $id;
    public $name;
    public $description;
    
    
    function Artist( $id, $name, $description){
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
      
    }
  }
?> 