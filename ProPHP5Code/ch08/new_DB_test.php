<?php

require_once('class.Database.php');

try {
  $db = Database::instance();
} catch (Exception $e) {
  // No point continuing...
  die("Unable to connect to the database.");
}

$sql = "SELECT count(1) FROM mytable";
$count = $db->getOne($sql);
print "There are $count records in mytable!<br>\n";

// start a transaction
$db->startTransaction();

// do an insert and an update
try {
  $arValues = array();
  $arValues['id'] = '#id#';
  $arValues['myval'] = 'blah blah blah';
  $newID = $db->insert('mytable', $arValues);

  print "The new record has the ID $newID<br>\n";

  // update the record we just created
  $arUpdate = array();
  $arUpdate['myval'] = 'foobar baz!';
  $affected = $db->update('mytable', $arUpdate, "id = $newID");
  
  print "Updated $affected records<br>\n";

  // write the changes to the database
  $db->commit();
} catch (Exception $e) {
  // some sort of error happened - abort the transaction
  // and print the error message
  $db->abort();
  print "An error occurred.<br>\n" . $e->getMessage();
}

?>
