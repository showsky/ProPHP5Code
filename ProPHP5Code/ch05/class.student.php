<?php
class Student {
  private $_id;
  private $_name;

  public $courses;
  
  public function __construct($id, $name) {
    $this->_id = $id;
    $this->_name = $name;
    
    $this->courses = new CourseCollection();
    $this->courses->setLoadCallback('_loadCourses', $this);
  }
  
  public function getName() {
    return $this->_name;
  }
  
  public function getID() {
    return $this->_id;
  }
  
  private function _loadCourses(Collection $col) {
    $arCourses = StudentFactory::getCoursesForStudent($this->_id, $col);
  }

  public function __toString() {
    return $this->_name;
  }
}
?>
