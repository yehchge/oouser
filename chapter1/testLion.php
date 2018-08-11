<?php

include('class.Lion.php');
include_once('class.Cat.php');

$objLion = new Lion();

$objPetter = new Cat();
$objPetter->petTheKitty($objLion);

$objLion->weight = 200; // kg = 450 lbs.
$objLion->furColor = 'brown';
$objLion->maneLength = 36; // cm = 14 inches
$objLion->eat();
$objLion->roar();
$objLion->sleep();
