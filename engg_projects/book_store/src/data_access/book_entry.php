<?php
  class bookEntry{
    public $id;
    public $book_name;
    public $book_author;
    public $book_publisher;
    public $book_price;
    
    
    function bookEntry( $id, $book_name,$book_author, $book_publisher, $book_price){
      $this->id = $id;
      $this->book_name = $book_name;
      $this->book_author = $book_author;
      $this->book_publisher = $book_publisher;
      $this->book_price = $book_price;
      
          }
  }
?>