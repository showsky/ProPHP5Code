<?php

  require_once('class.PropertyObject.php');
  require_once('class.PhoneNumber.php');
  require_once('class.Address.php');
  require_once('class.EmailAddress.php');

  abstract class Entity extends PropertyObject {
 
    private $_emails;
    private $_addresses;
    private $_phonenumbers;
   
    public function __construct($entityID) {
      $arData = DataManager::getEntityData($entityID);
     
      parent::__construct($arData);
  
      $this->propertyTable['entityid'] = 'entityid';
      $this->propertyTable['id'] = 'entityid';
      $this->propertyTable['name1'] = 'sname1';
      $this->propertyTable['name2'] = 'sname2';
      $this->propertyTable['type'] = 'ctype';
         
      $this->_emails = DataManager::getEmailObjectsForEntity($entityID);
      $this->_addresses = DataManager::getAddressObjectsForEntity($entityID);
      $this->_phonenumbers = 
                    DataManager::getPhoneNumberObjectsForEntity($entityID);
  
    }
     
    function setID($val) {
      throw new Exception('You may not alter the value of the ID field!');
    }

    function setEntityID($val) {
      $this->setID($val);
    }

    function phonenumbers($index) {
      if(!isset($this->_phonenumbers[$index])) {
        throw new Exception('Invalid phone number specified!');
      } else {
        return $this->_phonenumbers[$index];
      }
    }
     
    function getNumberOfPhoneNumbers() {
      return sizeof($this->_phonenumbers);
    }
   
    function addPhoneNumber(PhoneNumber $phone) {
      $this->_phonenumbers[] = $phone;
    }

    function addresses($index) {
      if(!isset($this->_addresses[$index])) {
        throw new Exception('Invalid address specified!');
      } else {
        return $this->_addresses[$index];
      }
    }
   
    function getNumberOfAddresses() {
      return sizeof($this->_addresses);
    }
   
    function addAddress(Address $address) {
      $this->_addresses[] = $address;
    }
   
    function emails($index) {
      if(!isset($this->_emails[$index])) {
        throw new Exception('Invalid email specified!');
      } else {
         return $this->_emails[$index];
      }
    }   
   
    function getNumberOfEmails() {
      return sizeof($this->_emails);
    }
 
    function addEmail(Email $email) {
      $this->_emails[] = $email;
    } 

    public function validate() {
      //Add common validation routines     
    }

  }
?>
