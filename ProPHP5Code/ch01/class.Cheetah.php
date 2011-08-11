<?php
  require_once('class.Cat.php');

  class Cheetah extends Cat {
    public $numberOfSpots;
   
    public function __construct() {
      $this->maxSpeed = 100;
    }
  }
?>
