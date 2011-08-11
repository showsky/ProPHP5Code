<?php

 session_start();

?>Having checked, I can tell you that my favorite artist is still <?=$_SESSION['favorite_artist']?>. 
At the moment, my identifier for this browser session, as allocated by PHP, is <?=session_id()?>.
<BR><BR>
<A HREF="firstpage.php">Go back to the first page</A>
?>
