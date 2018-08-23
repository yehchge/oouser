<?php

/**
 * @desc observer(觀察者介面)
 */
interface Observer{
    public function update(Observable $subject);
}

/**
 * @desc 圖形組件(widget)
 */
abstract class Widget implements Observer{
    
    // protected $internalData = array();
    private $subject;

    abstract public function draw();

    public function update(Observable $subject){
        // $this->internalData = $subject->getData();
        $this->subject = $subject;
    }

    public function getSubject(){
        return $this->subject;
    }
}

class BasicWidget extends Widget{

    function __construct(){
    }

    public function draw(){
        $html  = "<table border=1 width=130>";
        $html .= "<tr><td colspan=3 bgcolor=#cccccc>";
        $html .= "<b>Instrument Info</b></td></tr>";

        $data = $this->getSubject()->getData();
        $numRecords = count($data[0]);
        for($i = 0; $i < $numRecords; $i++){
            $instms = $data[0];
            $prices = $data[1];
            $years  = $data[2];
            $html .= "<tr><td>$instms[$i]</td><td> $prices[$i]</td>";
            $html .= "<td>$years[$i]</td></tr>";
        }
        $html .= "</table>";
        echo $html;
    }
}

class FancyWidget extends Widget{

    function __construct(){
    }

    public function draw(){
        $html  = "<table border=0 cellpadding=5 width=270 bgcolor=#6699BB>";
        $html .= "<tr><td colspan=3 bgcolor=#cccccc>";
        $html .= "<b><span class=blue>Our Latest Prices</span></b></td></tr>";
        $html .= "<tr><td><b>instrument</b></td>";
        $html .= "<td><b>price</b></td><td><b>date issued</b></td></tr>";
        
        $data = $this->getSubject()->getData();
        $numRecords = count($data[0]);
        for($i = 0; $i < $numRecords; $i++){
            $instms = $data[0];
            $prices = $data[1];
            $years  = $data[2];
            $html .= "<tr><td>$instms[$i]</td><td> $prices[$i]</td>";
            $html .= "<td>$years[$i]</td></tr>";
        }
        $html .= "</table>";
        echo $html;
    }
}
