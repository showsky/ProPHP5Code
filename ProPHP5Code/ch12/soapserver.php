<?php 
function sayHello($name){
   $salutation = "You, $name, will be delighted to know I am working!";
   return $salutation;
}

$server = new SoapServer ("greetings.wsdl");
$server->addFunction("sayHello");
$server->handle();
?>
