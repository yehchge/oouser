<?php

require "class.Musician.php";

$musician = new Musician("Float", "Jack", "guitarist");

$musician->setBand("The Variables");

echo "Musician " . $musician->getName() . "\n";
echo "is the " . $musician->getMusicianType() ."\n";
echo "in the band called " . $musician->getBand() . "\n";
