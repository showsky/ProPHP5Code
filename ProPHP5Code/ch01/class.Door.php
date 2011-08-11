<?php

require_once('interface.Openable.php');

class Door implements Openable {

  private $_locked = false;

  public function open() {
    if($this->_locked) {
      print "Can't open the door.  It's locked.";
    } else {
      print "creak...<br>";
    }
  }
 
  public function close() {
    print "Slam!!<br>";
  }

  public function lockDoor() {
    $this->_locked = true;
  }

  public function unlockDoor() {
    $this->_locked = false;
  }

}

?>
