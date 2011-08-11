<?php
abstract class LoggerBackend {
  protected $urlData;
  
  public function __construct($urlData) {
    $this->urlData = $urlData;
  }

  abstract function logMessage($message, $logLevel = LOGGER_INFO, $module);
}
?>
