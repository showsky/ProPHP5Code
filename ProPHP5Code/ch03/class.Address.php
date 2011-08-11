<?php
  require_once('class.PropertyObject.php');

  class Address extends PropertyObject {
   
    function __construct($addressid) {
      $arData = DataManager::getAddressData($addressid);

      parent::__construct($arData);

      $this->propertyTable['addressid'] = 'addressid';
      $this->propertyTable['id'] = 'addressid';
      $this->propertyTable['entityid'] = 'entityid';
      $this->propertyTable['address1'] = 'saddress1';
      $this->propertyTable['address2'] = 'saddress2';
      $this->propertyTable['city'] = 'scity';
      $this->propertyTable['state'] = 'cstate';
      $this->propertyTable['zipcode'] = 'spostalcode';
      $this->propertyTable['type'] = 'stype';
    }
   
    function validate() {
      if(strlen($this->state) != 2) {
        $this->errors['state'] = 'Please choose a valid state.';
      }
     
      if(strlen($this->zipcode) != 5 &&
         strlen($this->zipcode) != 10) {
          $this->errors['zipcode'] = 'Please enter a 5- or 9-digit zip code';
      }

     
      if(!$this->address1) {
            $this->errors['address1'] = 'Address 1 is a required field.';
      }
     
      if(!$this->city) {
            $this->errors['city'] = 'City is a required field.';
      }
     
      if(sizeof($this->errors)) {
        return false;
      } else {
        return true;
      }
    }
   
    function __toString() {
      return $this->address1 . ', ' .
             $this->address2 . ', ' .
             $this->city . ', ' .
             $this->state . ' ' . $this->zipcode;
    }
  }
?>
