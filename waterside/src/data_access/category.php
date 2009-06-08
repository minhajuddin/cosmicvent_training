
<?php

// Category class defination

  class Category{
    public $id;
    public $name;
    public $description;
  
    function Category($id,$name,$description) {
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
    }
  }
  
 ?>