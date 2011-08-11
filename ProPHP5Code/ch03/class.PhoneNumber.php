<?php
  require_once('class.PropertyObject.php');

  class PhoneNumber extends PropertyObject {
   
    function __construct($phoneid) {
      $arData = DataManager::getPhoneNumberData($phoneid);

      parent::__construct($arData);

      $this->propertyTable['phoneid'] = 'phoneid';
      $this->propertyTable['id'] = 'phoneid';
      $this->propertyTable['entityid'] = 'entityid';
      $this->propertyTable['number'] = 'snumber';
      $this->propertyTable['extension'] = 'sextension';
      $this->propertyTable['type'] = 'stype';
    }
   
    function validate() {
      if(!$this->number) {
            $this->errors['number'] = 'You must supply a phone number.';
      }
     
      if(sizeof($this->errors)) {
        return false;
      } else {
        return true;
      }
    }
   
    function __toString() {
      return $this->number .
             ($this->extension ? ' x' . $this->extension : '');
    }
  }
?>
