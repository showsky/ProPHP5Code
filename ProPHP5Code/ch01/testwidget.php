<?php

require_once('class.Widget.php');

  try {
    $objWidget = new Widget(1);
  
    print "Widget Name: " . $objWidget->getName() . "<br>\n";
    print "Widget Description: " . $objWidget->getDescription() . "<br>\n";

    $objWidget->setName('Bar');
    $objWidget->setDescription('This is a bartacular widget!');
  } catch (Exception $e) {
      die("There was a problem: " . $e->getMessage());
  }

?>
