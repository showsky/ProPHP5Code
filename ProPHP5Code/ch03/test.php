<?php
  require_once('class.DataManager.php'); //everything gets included by it

  function println($data) {
    print $data . "<br>\n";
  }

  $arContacts = DataManager::getAllEntitiesAsObjects();
  foreach($arContacts as $objEntity) {
 
    if(get_class($objEntity) == 'individual') {
      print "<h1>Individual - {$objEntity->__toString()}</h1>";
    } else {
      print "<h1>Organization - {$objEntity->__toString()}</h1>";
    }
 
    if($objEntity->getNumberOfEmails()) {
      //We have emails!  Print a header
      print "<h2>Emails</h2>";
     
      for($x=0; $x < $objEntity->getNumberOfEmails(); $x++) {
        println($objEntity->emails($x)->__toString());
      }
    }
 
    if($objEntity->getNumberOfAddresses()) {
      //We have addresses!
      print "<h2>Addresses</h2>";
     
      for($x=0; $x < $objEntity->getNumberOfAddresses(); $x++) {
        println($objEntity->addresses($x)->__toString());
      }
    }
 
    if($objEntity->getNumberOfPhoneNumbers()) {
      //We have phone numbers!
      print "<h2>Phones</h2>";
     
      for($x=0; $x < $objEntity->getNumberOfPhoneNumbers(); $x++) {
        println($objEntity->phonenumbers($x)->__toString());
      }
    }

    print "<hr>\n";
  }
?>
