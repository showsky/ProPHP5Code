<?php
$studentID = 1; //use a valid studentid value from your student table

try {
  $objStudent = StudentFactory::getStudent($studentID);  
} catch (Exception e) {
  die("Student #$studentID doesn't exist in the database!");
}

print $objStudent . 
      ($objStudent->courses->exists('CS101') ? ' is ' : ' is not ') .
      'currently enrolled in CS101';
//displays: "Bob Smith is enrolled in CS101"
?>
