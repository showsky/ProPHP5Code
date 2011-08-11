<?php 
$client = new SoapClient("greetings.wsdl"); 
print_r($client->sayHello("David")); 
?> 
