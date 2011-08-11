<?php
require_once ('class.Dispatcher.php');
?>

<HTML>
   <HEAD>
      <TITLE>Secure, Event Driven Record Viewer!</TITLE>
   </HEAD>
   <BODY>
      <FORM method="GET" ACTION="<?=$_SERVER['PHP_SELF']?>">
         <INPUT type="submit" name="event" value="View">
         <INPUT type="submit" name="event" value="Edit">
      </FORM>
   </BODY>
</HTML>

<?php
function handle(){
   $event = $_GET['event'];
   $disp = new dispatcher($event);
   $disp->handle_the_event();
}

session_start();
$_SESSION['name'] = "Horatio";

handle();
?>
