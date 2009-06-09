<?php

// painting class defination


  class Painting{
    public $id;
    public $title;
    public $description;
    public $price;
    public $status;
    public $image;
    public $categoryId;
    public $artistId;
  
  
    function Painting($id, $title, $description, $price, $status, $image, $categoryId, $artistId) {
      $this->id = $id;
      $this->subject = $title;
      $this->description = $description;
      $this->price = $price;
      $this->status = $status;
      $this->image = $image;
      $this->categoryId = $categoryId;
      $this->artistId = $artistId;
    }
  }
?>  