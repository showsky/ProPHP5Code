<?php
  require_once('class.Customer.php');

  class SweepstakesCustomer extends Customer {
    public function __construct($customerID) {
        parent::__construct($customerID);
     
        if($this->customerNumber == 1000000) {
          print "Congratulations $this->name!  You're our millionth customer! " .
                "You win a year's supply of frozen fish sticks!  ";
        }
     }
   }

?>
