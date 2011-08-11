<?php

  class Rectangle {
    public $height;
    public $width;
   
    public function __construct($width, $height) {
      $this->width = $width;
      $this->height = $height;
    }
    
     public function getArea() {
      return $this->height * $this->width;
     }
  }
?>
