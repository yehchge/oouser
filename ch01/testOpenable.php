<?php

/**
 * @desc 測試使用介面的程式
 */

require_once('class.Door.php');
require_once('class.Jar.php');

function openSomething(Openable $obj){
    $obj->open();
}

function closeSomething(Openable $obj){
    $obj->close();
}


// jelly 果凍
$objDoor = new Door();
$objJar = new Jar("jelly");

openSomething($objDoor);
openSomething($objJar);

closeSomething($objDoor);
closeSomething($objJar);