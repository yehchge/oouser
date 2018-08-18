<?php

// 說明繼承的用法

require_once('class.Cat.php');

/**
 * @desc Lion 獅子
 */
class Lion extends Cat {
    public $maneLength; // 鬃毛長度 in cm
    public function roar(){
        // roar 怒吼
        print "Roarrrrrrrrr!";
    }
}
