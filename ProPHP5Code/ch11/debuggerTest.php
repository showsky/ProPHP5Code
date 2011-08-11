<?php

  require_once('class.Debugger.php');
  
  $cfg = array();
  $cfg['DEBUG_LEVEL'] = DEBUG_INFO;
  
  $myData = array();
  $myData[] = 'hello';
  $myData[] = array('name' => 'Bob', 
              'colors' => array('red', 'green', 'blue'));
  
  Debugger::debug($myData, 'my data');
  
  $x = 5 + 8;
  Debugger::debug($x, 'x');
  
  Debugger::debugPrint();
  
?>
