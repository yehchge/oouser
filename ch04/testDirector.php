<?php

require_once('interface_builder.php');
require_once('class.RockBandBuilder.php');
require_once('application.php');

$builder = new RockBandBuilder("The Variables");
$band = Application::createBand($builder);

echo $band->getName();
// echo $band->getGenre();
// echo $band->getMusicians();
