<?
require_once("GenericObject.phpm");
require_once("user.phpm");

 $objUser = new User(1);
 $strUsername = $objUser->GetField("username");
 print $strUsername;
?>
