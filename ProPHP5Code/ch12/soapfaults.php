<?php
$client = new SoapClient("http://www.xmethods.net/sd/2001/BNQuoteService.wsdl", 
array("exceptions" => 0));
echo "The price of the book you requested is: <BR><B>$";
print $client->__call("getPrice", array("0764572822"));
?>
