<?php
require_once("interface_builder.php");
require_once("class_musician.php");
require_once("class_countryband.php");
require_once("class_instrument.php");

class CountryBandBuilder implements Builder {

  private $band;

  function __construct() {
         $this->band = new CountryBand();
  }

  public function getBand() {
         return $this->band;
  }

  public function buildDrummer() {

         $musician = new Musician("washboard player");

         $drumset = new Instrument("washboard");

         $musician->addInstrument($drumset);
         $this->band->addMusician($musician);
  }


  public function buildGuitarist() {

         $musician = new Musician("country guitarist");

         $guitar = new Instrument("acoustic guitar");

         $musician->addInstrument($guitar);
         $this->band->addMusician($musician);
  }
}
?>
