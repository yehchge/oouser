<?php

/**
 * @desc 說明如何使用 UML 的類別示意圖, 寫出一個物件
 */

class Musician {

    private $last;
    private $first;
    private $bandName; // 樂隊名稱
    private $type;

    function __construct($last, $first, $musicianType){
        $this->last = $last;
        $this->first = $first;
        $this->type = $musicianType;
    }

    public function getName(){
        echo $this->first . $this->last;
    }

    public function getBand(){
        echo $this->bandName;
    }

    public function getMusicianType(){
        echo $this->type;
    }

    public function setName($first, $last){
        $this->first = $first;
        $this->last = $last;
    }

    public function setBand($bandName){
        $this->bandName = $bandName;
    }

    public function setMusicianType($musicianType){
        $this->type = $musicianType;
    }
}
