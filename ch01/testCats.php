<?php

/**
 * @desc 測試並說明繼承的用法
 */

require_once('class.Cat.php');
require_once('class.Cheetah.php');

function petTheKitty(Cat $objCat){
    if($objCat->maxSpeed < 5){
        $objCat->purr();
    }else{
        print "Can't pet the kitty = it's moving at " .
            $objCat->maxSpeed . "kilometers per hour!\n";
    }
}

$objCheetah = new Cheetah();
petTheKitty($objCheetah);

$objCat = new Cat();
petThekitty($objCat);