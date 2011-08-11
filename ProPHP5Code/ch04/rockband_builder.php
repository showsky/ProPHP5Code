<?php

require_once("interface_builder.php");
require_once("class_rockband.php");
require_once("class_musician.php");
require_once("class_instrument.php");

class RockBandBuilder implements Builder {

  private $band;

  function __construct($name) {
         $this->band = new RockBand($name);
  }

  public function getBand() {
         return $this->band;
  }
  
  public function buildDrummer() {

         $musician = new Musician("rock drummer");

         $drumset = new Instrument("rock drum kit");
         $drumset->add(new Instrument("cymbal"));
         $drumset->add(new Instrument("bass drum"));
         $drumset->add(new Instrument("snare drum"));
  
         $musician->addInstrument($drumset);
         $this->band->addMusician($musician);
  }


  public function buildGuitarist() {

         $musician = new Musician("rock guitarist");
         
         $guitar = new Instrument("electric guitar");
         
         $musician->addInstrument($guitar);
         $this->band->addMusician($musician);

  }
}
?>
