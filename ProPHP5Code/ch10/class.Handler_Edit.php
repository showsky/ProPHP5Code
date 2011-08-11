<?php
require_once('class.Event_Handler.php');

class handler_Edit extends Event_Handler 
{
   private $handle;
   
   function __construct($event_handle){
      $this->handle = $event_handle;
   }
         
   function handled_event(){
      echo "This is event $this->handle, which is now handled - no kidding! <BR>";
   }
}
?>
