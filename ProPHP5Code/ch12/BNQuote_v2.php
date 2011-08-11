<?php
$client = new SoapClient("http://www.xmethods.net/sd/2001/BNQuoteService.wsdl",
  array("trace" => 1));
echo "The price of the book you requested is: <BR><B>$";
print $client->__call("getPrice", array("0764572822"));
echo "</B><BR> The request envelope result is: <B>";
print "<BR>".($client->__getLastRequest())."</BR>"; 
echo "</B> The response envelope result is: <B>"; 
print "<BR>".($client->__getLastResponse())."</B></BR>"; 
?>
