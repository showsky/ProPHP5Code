<?php

class Application {

  public static function createBand(Builder & $builder) {
  
         $builder->buildGuitarist();
         $builder->buildDrummer();
  
         return $builder->getBand();
  }
}
?>
