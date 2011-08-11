<?php

require_once('class.Database.php');

try {
  $objDB = new Database();
} catch (Exception $e) {
  echo $e->getMessage();
  exit(1);
}

try {
  $table = "mytable";
  $objDB->insert($table, array('myval' => 'foo') );
  $objDB->insert($table, array('myval' => 'bar') );
  $objDB->insert($table, array('myval' => 'blah') );
  $objDB->insert($table, array('myval' => 'mu') );
  $objDB->update($table, array('myval' => 'baz'), array('myval' => 'blah'));
  $objDB->delete($table, array('myval' => 'mu'));
  $data = $objDB->select("SELECT * FROM mytable");
  var_dump($data);
} catch (Exception $e) {
  echo "Query failure" . NL;
  echo $e->getMessage();
}
?>
