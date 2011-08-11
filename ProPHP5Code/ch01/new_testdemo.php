<?php

  require_once('new_class.Demo.php');

  $objDemo = new Demo();
  $objDemo->setName('Steve');
  $objDemo->sayHello();

  $objDemo->setName(37); //would trigger an error

?>
