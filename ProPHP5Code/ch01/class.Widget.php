<?php

class Widget {
  
  private $id;
  private $name;
  private $description;  private $hDB;
  private $needsUpdating = false;
  
  public function __construct($widgetID) {
    //The widgetID parameter is the primary key of a 
    //record in the database containing the information
    //for this object

    //Create a connection handle and store it in a private member variable
    $this->hDB = pg_connect('dbname=parts user=postgres');
    if(! is_resource($this->hDB)) {
      throw new Exception('Unable to connect to the database.');
    }
    
    $sql = "SELECT \"name\", \"description\" FROM widget WHERE widgetid = $widgetID";
    $rs = pg_query($this->hDB, $sql);
    if(! is_resource($rs)) {
      throw new Exception("An error occurred selecting from the database.");
    }
    
    if(! pg_num_rows($rs)) {
      throw new Exception('The specified widget does not exist!');
    }
        
    $data = pg_fetch_array($rs);
    $this->id = $widgetID;
    $this->name = $data['name'];
    $this->description = $data['description'];
    
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function getDescription() {
    return $this->description;
  }
  
  public function setName($name) {
    $this->name = $name;
    $this->needsUpdating = true;
  }
  
  public function setDescription($description) {
    $this->description = $description;
    $this->needsUpdating = true;
  }
  
  public function __destruct() {
    if(! $this->needsUpdating) {
      return;
    }
    
    $sql = 'UPDATE "widget" SET ';
    $sql .= "\"name\" = '" . pg_escape_string($this->name) . "', ";
    $sql .= "\"description\" = '" . pg_escape_string($this->description) . "' ";
    $sql .= "WHERE widgetID = " . $this->id;
    
    $rs = pg_query($this->hDB, $sql);
    if(! is_resource($rs)) {
      throw new Exception('An error occurred updating the database');
    }
    
    //You're done with the database.  Close the connection handle.
    pg_close($this->hDB);
  }
}
?>
