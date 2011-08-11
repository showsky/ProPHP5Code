<html>
<body>
<head>
<style>
body {font : 12px verdana; font-weight:bold}
td {font : 11px verdana;}
</style>
</head>

<?php

abstract class AbstractInstrument {
  
  private $name;
  private $category;
  private $instruments = array();
  
  public function add(AbstractInstrument & $instrument) {
     array_push($this->instruments, $instrument);
  }
  
  public function remove(AbstractInstrument & $instrument) {
     array_pop($this->instruments);
  }
        
  public function hasChildren() {
    return (bool)(count($this->instruments) > 0);
  }
    
  public function getChild($i) {
    return $instruments[i];
  }
    
  public function getDescription() {
    echo "- one " . $this->getName();
    if ($this->hasChildren()) {
      echo " which includes:<br>";
      foreach($this->instruments as $instrument) {
         echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>-";
         $instrument->getDescription();
         echo "</td></tr></table>";
      }        
    }
  }
  
 public function setName($name) {
   $this->name = $name;
 }
  
 public function getName() {
   return $this->name;
 }
         
 public function setCategory($category) {
    $this->category = $category;
 }

 public function getCategory() {
   return $this->category;
  }
}

class Guitar extends AbstractInstrument {
  function __construct($name) {
    parent::setName($name);
    parent::setCategory("guitars");
  }      
}

class DrumSet extends AbstractInstrument {
  function __construct($name) {
   parent::setName($name);
   parent::setCategory("drums");
  }
}

class SnareDrum extends AbstractInstrument {
  function __construct($name) {
    parent::setName($name);
    parent::setCategory("snare drums");
  }
}

class BaseDrum extends AbstractInstrument {
  function __construct($name) {
    parent::setName($name);
    parent::setCategory("base drums");
  }
}

class Cymbal extends AbstractInstrument {
  function __construct($name) {
    parent::setName($name);
    parent::setCategory("cymbals");
  }
}


$drums = new DrumSet("tama maple set");
$drums->add(new SnareDrum("snare drum"));
$drums->add(new BaseDrum("large bass drum"));

$cymbals = new Cymbal("zildjian cymbal set");
$cymbals->add(new Cymbal("small crash"));
$cymbals->add(new Cymbal("large high hat"));
$drums->add($cymbals);

$guitar = new Guitar("gibson les paul");

echo "List of Instruments: <p>";
$drums->getDescription();
$guitar->getDescription();

?>

</body>
</html>
