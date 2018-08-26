<?php

require_once('interface_builder.php');
require_once('class.RockBandBuilder.php');
require_once('class.CountryBandBuilder.php');
require_once('application.php');

// 請自行切換 $builder
$builder = new RockBandBuilder();
// $builder = new CountryBandBuilder();
$band = Application::createBand($builder);

// gerne 類型
print('The Gerne is '.$band->getGenre()."\n");

$aMusician = $band->getMusicians();

foreach($aMusician as $oMusician){
    print('The musician is '.$oMusician->getMusician()."\n");
    $aInstrument = $oMusician->getInstruments();
    print("The instrument is: \n");
    foreach($aInstrument as $instrument){
        $instrument->showInstrument();
    }
    print("\n");
}
