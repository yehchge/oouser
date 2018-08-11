<?php

// 此程式說明類別與物件

// 建構類別
class Demo {

    // 加入屬性
    private $_name;

    // 建構子, 初始化物件
    public function __construct($name) {
        $this->_name = $name;
    }

    // 加入方法
    function sayHello() {
        print "Hello {$this->getName()}!";
    }

    public function getName() {
        return $this->_name;
    }

    public function setName($name) {
        if(!is_string($name) || strlen($name) == 0) {
            throw new Exception("Invalid name value");
        }

        $this->_name = $name;
    }
}

?>
