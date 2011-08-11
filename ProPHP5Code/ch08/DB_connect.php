<?php

require_once('DB.php'); 
$dsn = 'pgsql://postgres@localhost/mydb';
$conn = DB::connect($dsn);

if(DB::isError($conn)) {
  //you would probably want to do something a bit more graceful here
  print("Unable to connect to the database using the DSN $dsn");
  die($conn->getMessage());
}

//get all results as an associative array
$conn->setFetchMode(DB_FETCHMODE_ASSOC);  

$sql = "SELECT * FROM mytable";
$data =& $conn->getAll($sql); //returns all rows. Only use with small recordsets


// Always check that $data is not an error
if (DB::isError($data)) {
    print("Error trying to run the query $sql");
    die ($data->getMessage());
}

var_dump($data);

$conn->disconnect(); //close the connection
?>
