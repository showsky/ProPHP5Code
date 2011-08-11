<?php
  require_once('class.Cat.php');

  class Lion extends Cat {
    public $maneLength;  //in cm

    public function roar() {
      print "Roarrrrrrrrr!";
    }
  }
?>
