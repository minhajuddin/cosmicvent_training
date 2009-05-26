<?php
  class Post{
    public $id;
    public $title;
    public $content;
    public $author;
    public $created_on;
    
    function Post( $id, $title, $content, $author, $created_on ){
      $this->id = $id;
      $this->title = $title;
      $this->content = $content;
      $this->author = $author;
      $this->created_on = $created_on;
    }
  }
?>