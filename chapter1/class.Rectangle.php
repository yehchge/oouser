<?php

/**
 * @desc 長方形
 */

class Rectangle {
    public $height; // 高
    public $width; // 寬

    public function __construct($width, $height){
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(){
        return $this->height * $this->width;
    }
}
