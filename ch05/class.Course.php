<?php

/**
 * @desc 課程類別
 * @created 2018/09/08
 */

class Course {
    private $_id;
    private $_courseCode;
    private $_name;

    public function __construct($id, $courseCode, $name){
        $this->_id = $id;
        $this->_courseCode = $courseCode;
        $this->_name = $name;
    }

    public function getName(){
        return $this->_name;
    }

    public function getID(){
        return $this->_id;
    }

    public function getcourseCode(){
        return $this->_courseCode;
    }

    public function __toString(){
        return $this->_name;
    }

}
