<?php
require_once('class.Event_Handler.php');

class handler_View extends Event_Handler 
{
   private $handle;

   function __construct($event_handle){
      $this->handle = $event_handle;
   }
         
   function handled_event(){
      echo "The event, $this->handle, is now handled. <BR> 
      It is, I promise!<BR><BR>Your records are as follows: <BR> <BR>";
    
      $id = parent::dbconn();
      $result = pg_query($id, "SELECT * FROM user");
      while($query_data = pg_fetch_row($result)) {
         echo "'",$query_data[1],"' is a ",$query_data[4],"<br>";
      }
   }
}
?>
