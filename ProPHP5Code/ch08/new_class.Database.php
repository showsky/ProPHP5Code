<?php

require_once('config.php');
require_once('DB.php');

class Database {
  private $conn;

  function __construct($dsn = null) {
    global $conn;
    
    //If nothing was passed in, use the value from $cfg
    if($dsn == null) {
      $dsn = $cfg['db']['dsn'];
    }
    
    //Open a connection using the info in $dsn
    $this->conn = DB::connect($dsn);
    
    if(DB::isError($this->conn)) {
      //We're not connected.  Throw an exception
      throw new Exception($this->conn->getMessage(), $this->conn->getCode());
    }
    
    //Always fetch data as an associative array
    $this->conn->setFetchMode(DB_FETCHMODE_ASSOC);
  }
  
  //returns a DB_result object  
  function select($sql) {
    $result = $this->conn->query($sql);
   
    if(DB::isError($result)) {
      throw new Exception($result->getMessage(), $result->getCode());
    }
    
    return $result;
  }
  
  //returns 2D assoc array
  function getAll($sql) {
    $result = $this->conn->getAll($sql);
   
    if(DB::isError($result)) {
      throw new Exception($result->getMessage(), $result->getCode());
    }
    
    return $result;
  }
  
  //returns single scalar value from the first column, first record
  function getOne($sql) {
    $result = $this->conn->getOne($sql);
    
    if(DB::isError($result)) {
      throw new Exception($result->getMessage(), $result->getCode());
    }
    
    return $result;
  }
  
  //returns numerically indexed 1D array of values from the first column
  function getColumn($sql) {
    $result = $this->conn->getCol($sql);
    
    if(DB::isError($result)) {
      throw new Exception($result->getMessage(), $result->getCode());
    }
    
    return $result;
  }
  function update($tableName, $arUpdates, $sWhere = null) {
    
    $arSet = array();
    foreach($arUpdates as $name => $value) {
      $arSet[] = $name . ' = ' . $this->conn->quoteSmart($value);
    }
    $sSet = implode(', ', $arSet);

    //make sure the table name is properly escaped
    $tableName = $this->conn->quoteIdentifier($tableName);   

    $sql = "UPDATE $tableName SET $sSet";
    if($sWhere) {
      $sql .= " WHERE $sWhere";
    }
    
    $result = $this->conn->query($sql);
    
    if(DB::isError($result)) {
      throw new Exception($result->getMessage(), $result->getCode());
    }
    
    //return the number of rows affected
    return $this->conn->affectedRows();
  }
function insert($tableName, $arValues) {
    $id = null;
      
    $sFieldList = join(', ', array_keys($arValues));
    
    $arValueList = array();
    foreach($arValues as $value) {
      if(strtolower($value) == '#id#') {
        //we need to get the next value from this table's sequence
        $value = $id = $this->conn->nextID($tableName . "_id");
      }   
      $arValueList[] = $this->conn->quoteSmart($value);
    }
    $sValueList = implode(', ', $arValueList);
    
    //make sure the table name is properly escaped
    $tableName = $this->conn->quoteIdentifier($tableName);
    
    $sql = "INSERT INTO $tableName ( $sFieldList) VALUES ( $sValueList )";
    $result = $this->conn->query($sql);
    
    if(DB::isError($result)) {
      throw new Exception($result->getMessage(), $result->getCode());
    }
    
    //return the ID, if there was one, or the number of rows affected
    return $id ? $id : $this->conn->affectedRows();
  }
  function startTransaction() {
    //autoCommit returns true/false if the command succeeds
    return $this->conn->autoCommit(false);
  }
  function commit() {
    $result = $this->conn->commit();
    
    if(DB::isError($result)) {
      throw new Exception($result->getMessage(), $result->getCode());
    }
    
    $this->conn->autoCommit(true);
    return true;
  }
  
  function abort() {
    $result = $this->conn->rollback();
    
    if(DB::isError($result)) {
      throw new Exception($result->getMessage(), $result->getCode());
    }
    
    return true;
  }
  
  
  function __destruct() {
    $this->conn->disconnect();
  }
}
?>
