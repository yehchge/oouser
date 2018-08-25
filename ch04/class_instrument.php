<?php

/**
 * @desc 樂器
 */
class Instrument {

    private $name;
    private $instruments = array();

    function __construct($name){
        $this->name = $name;
    }

    public function add(Instrument $instrument){
        array_push($this->instruments, $instrument);
    }
}
