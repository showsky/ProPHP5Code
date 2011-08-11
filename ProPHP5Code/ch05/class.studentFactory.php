<?php
class StudentFactory {
  
  public static function getStudent($id) {
    $sql = "SELECT * from \"student\" WHERE \"studentid\" = $id";

    $data = $db->select($sql); //pseudo code.  Assume it returns an
                              //array containing all rows returned
                              //by the query.

    if(is_array($data) && sizeof($data)) {
      return new Student($data[0]['studentid'], $data[0]['name']);
    } else {
      throw new Exception("Student $id does not exist.");
    }
  }
  
  public static function getCoursesForStudent($id, $col) {
    $sql = "SELECT \"course\".\"courseid\",
                   \"course\".\"coursecode\",
                   \"course\".\"name\"
            FROM \"course\", \"studentcourse\" WHERE
                   \"course\".\"id\" = \"studentcourse\".\"courseid\" AND 
                   \"studentcourse\".\"studentid\" = $id";

    $data = $db->select($sql);  //same pseudo code in getStudent() 

    if(is_array($data) && sizeof($data)) {
      foreach($data as $datum) {
        $objCourse = new Course($datum['courseid'], $datum['coursecode'], 
                                $datum['name']);
        $col->addItem($objCourse, $objCourse->getCourseCode());
      }
    }

  }
}
?>
