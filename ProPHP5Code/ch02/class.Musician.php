class Musician {

  private $last;
  private $first;
  private $bandName;
  private $type;

  function __construct($last, $first, $musicianType) {
         $this->last = $last;
         $this->first = $first;
         $this->mtype = $musicianType;
  }
  
  public function getName() {
         echo $this->first . $this->last;
  }
  
  public function getBand() {
         echo $this->bandName;
  }      
  
  public function getMusicanType() {
         echo $this->type;
  }      

  public function setName($first, $last) {
         $this->first = $first;
         $this->last = $last;
  }
  
  public function setBand($bandName) {
         $this->bandName = $bandName;
  }
  
  public function setMusicanType($musicianType) {
         $this->type = $musicianType;
  }      
}
