<?php
  require_once('class.PropertyObject.php');

  class EmailAddress extends PropertyObject {
   
    function __construct($emailid) {
      $arData = DataManager::getEmailData($emailid);

      parent::__construct($arData);

      $this->propertyTable['emailid'] = 'emailid';
      $this->propertyTable['id'] = 'emailid';
      $this->propertyTable['entityid'] = 'entityid';
      $this->propertyTable['email'] = 'semail';
      $this->propertyTable['type'] = 'stype';
    }
   
    function validate() {
      if(!$this->email) {
            $this->errors['email'] = 'You must set an email address.';
      }
     
      if(sizeof($this->errors)) {
        return false;
      } else {
        return true;
      }
    }
   
    function __toString() {
      return $this->email;
    }
  }
?>
