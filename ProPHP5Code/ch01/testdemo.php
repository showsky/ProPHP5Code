<?php

  require_once('class.Demo.php');

  $objDemo = new Demo();
  $objDemo->name = 'Steve';

  $objAnotherDemo = new Demo();
  $objAnotherDemo->name = 'Ed';

  $objDemo->sayHello();
  $objAnotherDemo->sayHello();

?>
