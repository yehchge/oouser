<?php

/**
 * @desc 測試 studentFactory
 * @created 2018/09/09
 */

require_once("class.StudentFactory.php");

$studentID = 1; // use a valid studentid value from your student table

try{
    $objStudent = StudentFactory::getStudent($studentID);
} catch (Exception $e){
    echo $e->getMessage()."\n";
    die("Student #$studentID doesn`t exist in the database!");
}

print $objStudent . ($objStudent->courses->exists('CS101') ? ' is ' : ' is not ') . 'currently enrolled in CS101';
//display: "Bob Smith is enrolled in CS101"
