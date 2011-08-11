<?php

function logMessage($message) {
  $LOGDIR = '/www/mysite/logs/';  //chmod 744 and chown nobody
  $logFile = $LOGDIR . 'mysite.log';
  $hFile = fopen($logFile, 'a+'); //open for appending, create
                                  //the file if it doesn't exist
  if(! is_resource($hFile)) {
    printf("Unable to open %s for writing.  Check file permissions.", $logFile);
    return false;
  }

  fwrite($hFile, $message);
  fclose($hFile);

  return true;
}

logMessage("Hello, log!\n");
?>
