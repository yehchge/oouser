<?php

/**
 * @desc 罐子 開關 / 使用介面
 */

require_once('interface.Openable.php');

class Jar implements Openable {
    private $contents;

    public function __construct($contents){
        $this->contents = $contents;
    }

    public function open(){
        print "the jar is now open\n";
    }

    public function close(){
        print "the jar is now closed\n";
    }

}
