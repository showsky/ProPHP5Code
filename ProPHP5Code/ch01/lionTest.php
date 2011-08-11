<?php
  include('class.Lion.php');

  $objLion = new Lion();
  $objLion->weight = 200;   //kg = ~450 lbs.
  $objLion->furColor = 'brown';
  $objLion->maneLength = 36;  //cm = ~14 inches
  $objLion->eat();
  $objLion->roar();
  $objLion->sleep();
?>
