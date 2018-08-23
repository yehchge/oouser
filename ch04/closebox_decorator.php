<?php

/**
 * @desc 另一個裝飾者模式(Decorator Pattern)
 * @info 具有結束按鈕的點簡單選單列
 * @created 2018/08/23
 */

require_once("abstract_widget.php");

class CloseBoxDecorator extends Widget {

    private $widget;

    function __construct(Widget $widget){
        $this->widget = $widget;
    }

    public function draw(){
        $this->widget->update($this->getSubject());

        print "<table border=0 cellspacing=1 bgcolor=#666666>";
        print "<tr bgcolor=#666666>";
        print "<td align=right>";
        print "    <table width=10 height=10 bgcolor=#cccccc>";
        print "    <tr><td><b>x</b></td></tr>";
        print "    </table>";
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
