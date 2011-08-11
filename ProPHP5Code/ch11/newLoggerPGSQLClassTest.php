<?php

$cfg['LOGGER_LEVEL'] = LOGGER_INFO;

Logger::register('app', 'pgsql://steve@localhost/mydb?table=logdata');

$log = Logger::getInstance('app');

if(isset($_GET['fooid'])) {
  
  //not written to the log - the log level is too high
  $log->logMessage('A fooid is present', LOGGER_DEBUG);
  
  //LOG_INFO is the default, so this would get printed
  $log->logMessage('The value of fooid is ' .  $_GET['fooid']);
  
} else {
  
  //This will also be written and includes a module name
  $log->logMessage('No fooid passed from ' . $_SERVER['HTTP_REFERER'], 
                   LOGGER_CRITICAL,
                   "Foo Module");
  
  throw new Exception('No foo id!');
}
?>
