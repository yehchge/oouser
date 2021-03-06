<?php

require_once('interface_band.php');

/**
 * @desc 搖滾樂隊(RockBand)
 */
class RockBand implements Band {
    private $bandGenre;
    private $musicians;

    function __construct(){
        $this->musicians = array();
        $this->bandGenre = "rock"; // 搖滾
    }

    public function getGenre(){
        return $this->bandGenre;
    }

    public function addMusician(Musician $musician){
        array_push($this->musicians, $musician);
        $musician->assignToBand($this);
    }

    public function getMusicians(){
        return $this->musicians;
    }
}
