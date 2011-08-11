<?
require_once('interface.Openable.php');

class Jar implements Openable {
  private $contents;

  public function __construct($contents) {
    $this->contents = $contents;
  }

  public function open() {
    print "the jar is now open<br>";
  }
 
  public function close() {
    print "the jar is now closed<br>";
  }
}
?>
