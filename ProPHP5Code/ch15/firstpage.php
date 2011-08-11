<?php

 session_start();
 $_SESSION['favorite_artist'] = 'Tori Amos';

?>Currently, my favorite artist is Tori Amos. It may also interest you to know that my identifer for this browser session, as allocated by PHP, is <?=session_id()?>.
<BR><BR>
<A HREF="secondpage.php">Go to the second page</A>
?>
