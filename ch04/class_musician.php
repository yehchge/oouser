<?php

/**
 * @desc 說明如何使用 UML 的類別示意圖, 寫出一個物件
 */

require_once('class_instrument.php');

/**
 * @desc 音樂家(Musician)
 */
class Musician {

    private $bandName; // 樂隊名稱
    private $instruments = array();
    private $bandReference;

    function __construct($bandName){
        $this->bandName = $bandName;
    }

    public function getBand(){
        return $this->bandName;
    }

    public function setBand($bandName){
        $this->bandName = $bandName;
    }

    public function addInstrument(Instrument $instrument){
        array_push($this->instruments, $instrument);
    }

    public function assignToBand(Band $band){
        $this->bandReference = $band;
    }

}
