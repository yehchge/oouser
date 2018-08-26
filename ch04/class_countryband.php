<?php

require_once('interface_band.php');

/**
 * @desc 民歌樂隊(CountryBand)
 */
class CountryBand implements Band {
    private $bandGenre;
    private $musicians;

    function __construct(){
        $this->musicians = array();
        $this->bandGenre = "country"; // 民歌
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
