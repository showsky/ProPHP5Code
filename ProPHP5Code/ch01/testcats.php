<?php
require_once('class.Cheetah.php');

  function petTheKitty(Cat $objCat) {
    if($objCat->maxSpeed < 5) {
      $objCat->purr();
    } else {
       print "Can't pet the kitty - it's moving at " .
             $objCat->maxSpeed . " kilometers per hour!";
    }
  }

  $objCheetah = new Cheetah();
  petTheKitty($objCheetah);

  $objCat = new Cat();
  petTheKitty($objCat);
?>
