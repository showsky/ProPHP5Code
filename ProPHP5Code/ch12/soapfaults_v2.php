<?php
$client = new SoapClient("http://www.xmethods.net/sd/2001/BNQuoteService.wsdl", 
array("exceptions" => 0));
$methodresult = $client->__call("getPriceRequest", array("0764572822"));
if (is_soap_fault($methodresult)){
   echo "We have a problem: <BR>";
   var_dump($methodresult);
}
?>
