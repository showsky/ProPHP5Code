<?php
require_once ("interface.Handled.php");
require_once('common_db.inc');

abstract class Event_Handler 
{
   function dbconn(){
      $link_id = db_connect('sample_db');
      return $link_id;
   }
   
   abstract function handled_event();
}
?>
