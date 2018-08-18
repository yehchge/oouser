<?php

/**
 * @desc 門 / 開關 使用介面
 */

require_once('interface.Openable.php');

class Door implements Openable {

    private $_locked = false;

    public function Open(){
        if($this->_locked){
            print "can't open the door. It's locked.\n";
        }else{
            print "creak...\n"; // 吱吱
        }
    }

    public function close(){
        print "Slam!!\n"; // 猛撞
    }

    public function lockDoor(){
        $this->_locked = true;
    }

    public function unlockDoor(){
        $this->_locked = false;
    }
}
