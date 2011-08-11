<?php
  require_once('class.Rectangle.php');

  class Square extends Rectangle {
    public function __construct($size) {
      $this->height = $size;
      $this->width = $size;
    }
   
    public function getArea() {
      return pow($this->height, 2);
    }
   
  }
?>
