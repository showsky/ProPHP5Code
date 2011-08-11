<?php
 
//Log Levels.  The higher the number, the less severe the message
//Gaps are left in the numbering to allow for other levels
//to be added later
define('LOGGER_DEBUG', 100);
define('LOGGER_INFO', 75);
define('LOGGER_NOTICE', 50);
define('LOGGER_WARNING', 25);
define('LOGGER_ERROR', 10);
define('LOGGER_CRITICAL', 5);

class Logger {

  private $hLogFile;
  private $logLevel;

  //Note: private constructor.  Class uses the singleton pattern
  private function __construct() {
    
  }


  public static function register($logName, $connectionString) {
    $urlData = parse_url($connectionString);
    
    if(! isset($urlData['scheme'])) {
      throw new Exception("Invalid log connection string $connectionString");
    }
    
    include_once('Logger/class.' . $urlData['scheme'] . 'LoggerBackend.php');
    
    $className = $urlData['scheme'] . 'LoggerBackend';
    if(! class_exists($className)) {
      throw new Exception('No logging backend available for ' . 
                          $urlData['scheme']);
    }
    
    $objBack = new $className($urlData);
    
    Logger::manageBackends($logName, $objBack);
  }
  
  public static function getInstance($name) {
    return Logger::manageBackends($name);
  }
  
  private static function manageBackends($name, LoggerBackend $objBack = null) {
    static $backEnds;
    
    if(! isset($backEnds)) {
      $backEnds = array();
    }
    
    if(! isset($objBack)) {
      //we must be retrieving
      if(isset($backEnds[$name])) {
        return $backEnds[$name];
       } else {
        throw new Exception("The specified backend $name was not " . 
                            "registered with Logger.");
       }
      
     } else {
       //we must be adding
      $backEnds[$name] = $objBack;
     }
  }
       
   
   public static function levelToString($logLevel) {
    switch ($logLevel) {
      case LOGGER_DEBUG:
        return 'LOGGER_DEBUG';
        break;
      case LOGGER_INFO:
        return 'LOGGER_INFO';
        break;
      case LOGGER_NOTICE:
        return 'LOGGER_NOTICE';
        break;
      case LOGGER_WARNING:
        return 'LOGGER_WARNING';
        break;
      case LOGGER_ERROR:
        return 'LOGGER_ERROR';
        break;
      case LOGGER_CRITICAL:
        return 'LOGGER_CRITICAL';
      default:
        return '[unknown]';
    }
  }
}

?>
