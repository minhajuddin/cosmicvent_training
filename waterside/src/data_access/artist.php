<?php

// Artist class defination

  class Artist{
    public $id;
    public $name;
    public $picture;
    public $description;
    public $show_status;
    
    
    function Artist( $id, $name, $description, $picture, $show_status){
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
      $this->picture = $picture;
      $this->show_status = $show_status;
      
    }
  }
?> 