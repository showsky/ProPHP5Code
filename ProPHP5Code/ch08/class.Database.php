<?php
require_once('config.php');

class Database {
  
  private $hConn;
  
  public function __construct() {
    
    global $cfg;   // allow our method to access the $cfg associative array
			  // by making it global
    
    $connString  = ' host=' . $cfg['db']['host'];
    $connString .= ' user=' . $cfg['db']['user'];
    $connString .= ' password=' . $cfg['db']['password'];
    $connString .= ' port=' . $cfg['db']['port'];
    $connString .= ' dbname=' . $cfg['db']['name'];
    
    $this->hConn = @pg_connect($connString);
    
    if(! is_resource($this->hConn)) {
      throw new Exception("Unable to connect to the database " . 
                          "using \"$connString\"", E_USER_ERROR);
    }
    
  }

  public function select($sql) {
   
   $hRes = @pg_query($this->hConn, $sql);
    if(! is_resource($hRes)) {
      $err = pg_last_error($this->hConn);
      throw new Exception($err);
    }
   
    $arReturn = array();
    while( ($row = pg_fetch_assoc($hRes)) ) {
      $arReturn[] = $row;
    }
    
    return $arReturn; 

  }

  public function update($table, $arFieldValues, $arConditions) {
   
    // create a useful array for the SET clause
    $arUpdates = array();
    foreach($arFieldValues as $field => $val) {
      if(! is_numeric($val)) {
        //make sure the values are properly escaped
        $val = "'" . pg_escape_string($val) . "'";
      }      
   
      $arUpdates[] = "$field = $val";
    }
   
    // create a useful array for the WHERE clause 
    $arWhere = array();
    foreach($arConditions as $field => $val) {
      if(! is_numeric($val)) {
        //make sure the values are properly escaped
        $val = "'" . pg_escape_string($val) . "'";
      }      
   
      $arWhere[] = "$field = $val";
    }

    $sql  = "UPDATE $table SET ";    
    $sql .= join(', ', $arUpdates);
    $sql .= ' WHERE ' . join(' AND ', $arWhere);
    
    $hRes = pg_query($sql);
    if(! is_resource($hRes)) {
      $err = pg_last_error($this->hConn) . NL . $sql;
      throw new Exception($err);
    }   
  
    return pg_affected_rows($hRes);    
  }

  function delete($table, $arConditions) {
    
    //create a useful array for generating the WHERE clause
    $arWhere = array();
    foreach($arConditions as $field => $val) {
      if(! is_numeric($val)) {
        //make sure the values are properly escaped
        $val = "'" . pg_escape_string($val) . "'";
      }      
   
      $arWhere[] = "$field = $val";
    }
    
    $sql = "DELETE FROM $table WHERE " . join(' AND ', $arWhere);
    
    $hRes = pg_query($sql);
    if(! is_resource($hRes)) {
      $err = pg_last_error($this->hConn) . NL . $sql;
      throw new Exception($err);
    }   
  
    return pg_affected_rows($hRes);    
  }
  
  
  
  public function insert($table, $arFieldValues) {
    $fields = array_keys($arFieldValues);
    $values = array_values($arFieldValues);

    // Create a useful array of values
    // that will be imploded to be the 
    // VALUES clause of the insert statement.
    // Run the pg_escape_string function on those
    // values that are something other than numeric.
    $escVals = array();
    foreach($values as $val) {
      if(! is_numeric($val)) {
        //make sure the values are properly escaped
        $val = "'" . pg_escape_string($val) . "'";
      }
      $escVals[] = $val;
    }

    //generate the SQL statement 
    $sql = " INSERT INTO $table (";
    $sql .= join(', ', $fields);
    $sql .= ') VALUES(';    
    $sql .= join(', ', $escVals);
    $sql .= ')';
    
    $hRes = pg_query($sql);
    if(! is_resource($hRes)) {
      $err = pg_last_error($this->hConn) . "\n" . $sql;
      throw new Exception($err);
    }   
  
    return pg_affected_rows($hRes);
  }
  

  
  public function __destruct() {
    if(is_resource($this->hConn)) {
      @pg_close($this->hConn);
    }
  }  

}
