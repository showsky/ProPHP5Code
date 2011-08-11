<?php
class Collection {

  private $_members = array();    //collection members

  private $_onload;               //holder for callback function

  private $_isLoaded = false;     //flag that indicates whether the callback
                                  //has been invoked

  public function addItem($obj, $key = null) {
    $this->_checkCallback();      //_checkCallback is defined a little later
        
    if($key) {
      if(isset($this->_members[$key])) {
        throw new KeyInUseException("Key \"$key\" already in use!");
      } else {
        $this->_members[$key] = $obj;
      }
    } else {
      $this->_members[] = $obj;
    }
  }

  public function removeItem($key) {
    $this->_checkCallback();
    
    if(isset($this->_members[$key])) {
      unset($this->_members[$key]);
    } else {
      throw new KeyInvalidException("Invalid key \"$key\"!");
    }  
  }
  
  public function getItem($key) {
    $this->_checkCallback();
    
    if(isset($this->_members[$key])) {
      return $this->_members[$key];
    } else {
      throw new KeyInvalidException("Invalid key \"$key\"!");
    }
  }

  public function keys() {
    $this->_checkCallback();
    return array_keys($this->_members);
  }

  public function length() {
    $this->_checkCallback();
    return sizeof($this->_members);
  }

  public function exists($key) {
    $this->_checkCallback();
    return (isset($this->_members[$key]));
  }

  /**
   * Use this method to define a function to be 
   * invoked prior to accessing the collection.  
   * The function should take a collection as a 
   * its sole parameter.
   */
  public function setLoadCallback($functionName, $objOrClass = null) {
    if($objOrClass) {
      $callback = array($objOrClass, $functionName);
    } else {
      $callback = $functionName;
    }
    
    //make sure the function/method is valid
    if(!is_callable($callback, false, $callableName)) {
      throw new Exception("$callableName is not callable " . 
                          "as a parameter to onload");
      return false;
    }
    
    $this->_onload = $callback;
  }
  
  /**
   * Check to see if a callback has been defined and if so,
   * whether or not it has already been called.  If not,
   * invoke the callback function.
   */
  private function _checkCallback() {
    if(isset($this->_onload) && !$this->_isLoaded) {
      $this->_isLoaded = true;
      call_user_func($this->_onload, $this);
    }
  }
}
?>
