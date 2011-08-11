<?php
require_once("xdir_broken.phpm");
require_once("PHPUnit.php");
class MyTestCase extends PHPUnit_TestCase
{
    var $objXDirClass;

    function __construct($name) {
       $this->PHPUnit_TestCase($name);
    }

    function setUp() {
        $this->objXDirClass = new XDir("", "true");
    }

    function tearDown() {
        unset($this->objXDirClass);
    }

    function testRead() {
        $this->objXDirClass->counter = 1;
        $intCounterBefore = $objXDirClass->counter;
        $this->objXDirClass->entries = array("/home/ed/test1", "/home/ed/test2", "/home/ed/test3", "/home/ed/test4");
        $strActualResult = $this->objXDirClass->read();
        $intActualCounterAfter = $this->objXDirClass->counter;
        $strExpectedResult = "/home/ed/test2";
        $intExpectedCounterAfter = 2;
        $this->assertTrue(($strActualResult == $strExpectedResult) && ($intActualCounterAfter == $intExpectedCounterAfter));
    }
  }
?>