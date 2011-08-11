<?php
require_once("abstract_widget.php");

class CloseBoxDecorator extends Widget {

  private $widget;

  function __construct(Widget & $widget) {
         $this->widget = $widget;
  }

  public function draw() {

         $this->widget->update($this->getSubject());

         print "<table border=0 cellspacing=1 bgcolor=#666666>";
         print "<tr bgcolor=#666666>";
         print "<td align=right>";
         print "        <table width=10 height=10 bgcolor=#cccccc>";
         print "        <tr><td><b>x</b></td></tr>";
         print "        </table>";
         print "</td>";
         print "</tr>";
         print "<tr bgcolor=#ffffff>";
         print "<td>";
         
         $this->widget->draw();
         
         print "</td>";
         print "</tr>";
         print "</table>";
  }
                 
}
