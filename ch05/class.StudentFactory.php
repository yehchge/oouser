<?php

/**
 * @desc 學生類別
 * @created 2018/09/08
 */

require_once("class.Database.php");
require_once("class.Student.php");
require_once("class.Course.php");

class StudentFactory {
    public static function getStudent($id){
        $db = Database::instance();

        $sql = "SELECT * FROM student WHERE studentid = $id";
        $data = $db->select($sql); // pseudo code. Assume it returns an
                                   // array containing all rows returned
                                   // by the query.
        
        if(is_array($data) && sizeof($data)){
            return new Student($data[0]['studentid'], $data[0]['name']);
        }else{
            throw new Exception("Student $id does not exist.");
        }
    }

    public static function getCoursesForStudent($id, $col){
        $db = Database::instance();

        $sql = "SELECT course.courseid,
                       course.coursecode,
                       course.name
                FROM course, studentcourse
                WHERE course.courseid = studentcourse.studentid
                AND studentcourse.studentid = $id";

        $data = $db->select($sql); //sane pseudo code in getStudent()

        if(is_array($data) && sizeof($data)){
            foreach($data as $datum){
                $objCourse = new Course($datum['courseid'], $datum['coursecode'], $datum['name']);
                $col->addItem($objCourse, $objCourse->getCourseCode());
            }
        }
    }

}
