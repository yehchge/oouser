<?php

include_once('class.Cat.php');

/**
 * @desc 獵豹
 */
class Cheetah extends Cat {
    public $numberOfSpots; // 斑點數目

    public function __construct(){
        $this->maxSpeed = 100;
    }
}
