<?php

Logger::register('errors', 'file:///var/log/error.log');
Logger::register('app, 
                 'pgsql://postgres@db/errors?table=applog&timestamp=dtlog&' . 
                                             'msg=smesg&level=slevel&module=smod');

$objQLog = Logger::getInstance('queries');

$sql = "SELECT * FROM foo";
$objQLog->logMessage("Selecting all foos");

try {
  Database->getInstance()->select($sql);
} catch (DBQueryException $e) {
   $objErrLog = Logger::getInstance('errors');
   $objErrLog->logMessage($e->getMessage(), LOGGER_CRITICAL);
}
?>
