<?php
  require_once('class.Door.php');
  require_once('class.Jar.php');

  function openSomething(Openable $obj) {
    $obj->open();
  }

  $objDoor = new Door();
  $objJar = new Jar("jelly");

  openSomething($objDoor);
  openSomething($objJar);
?>
