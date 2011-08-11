<?php
  require_once('class.Entity.php');
  require_once('class.Organization.php');
 
  class Individual extends Entity {
   
    public function __construct($userID) {
      parent::__construct($userID);
     
      $this->propertyTable['firstname'] = 'name1';
      $this->propertyTable['lastname'] = 'name2';

    }

    public function __toString() {
      return $this->firstname . ' ' . $this->lastname;
    }
   
    public function getEmployer() {
      return DataManager::getEmployer($this->id);
    }
   
    public function validate() {
      parent::validate();

      //add individual-specific validation
     
    }
 
  }
?>
