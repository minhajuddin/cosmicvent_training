<?php

// painting class defination


  class Painting{
    public $id;
    public $subject;
    public $description;
    public $categoryId;
    public $artistId;
  
  
    function Painting($id,$subject,$description,$categoryId,$artistId) {
      $this->id = $id;
      $this->subject = $subject;
      $this->description = $description;
      $this->categoryId = $categoryId;
      $this->artistId = $artistId;
    }
  }
?>  