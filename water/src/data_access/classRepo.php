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


// painting class defination


  class Painting{
    public $id;
    public $subject;
    public $description;
    public $categoryId;
    public $authorId;
  
  
    function painting($id,$subject,$description,$categoryId,$authorId) {
      $this->id = $id;
      $this->subject = $subject;
      $this->description = $description;
      $this->categoryId = $categoryId;
      $this->authorId = $authorId;
    }
  }
  

 // Category class defination


  class Category{
    public $id;
    public $name;
    public $description;
  
    function painting($id,$name,$description) {
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
    }
  }
  
 ?>