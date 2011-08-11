<?php
require_once("usersession.phpm");

$objSession = new UserSession();
$objSession->Impress();


?>
UserSession Test Page
<HR>
<B>Current Session ID: </B> <?=$objSession->GetSessionIdentifier();?><BR>
<B>Logged in? </B> <?=(($objSession->IsLoggedIn() == true) ? "Yes" : "No")?><BR>
<BR><BR>
Attempting to log in ...
<?php $objSession->Login("ed","12345"); ?>
<BR><BR>
<B>Logged in? </B> <?=(($objSession->IsLoggedIn() == true) ? "Yes" : "No")?><BR>
<B>User ID of logged in user: </B> <?=$objSession->GetUserID();?><BR>

<BR><BR>
Now logging out...
<?php $objSession->Logout(); ?>

<BR><BR>
<B>Logged in? </B> <?=(($objSession->IsLoggedIn() == true) ? "Yes" : "No")?><BR>
<BR><BR>
