<?php

  class Cat {
    public $weight;        //in kg
    public $furColor;
    public $whiskerLength;
    public $maxSpeed;      //in km/hr
   
    public function eat() {
      //code for eating...
    }
   
    public function sleep() {
      //code for sleeping...
    }
   
    public function hunt(Prey $objPrey) {
      //code for hunting objects of type Prey
      //which we will not define...
    }
   
    public function purr() {
      print "purrrrrrr..." . "\n";
    }
  }
?>
