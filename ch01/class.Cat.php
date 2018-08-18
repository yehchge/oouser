<?php

/**
 * @desc 貓
 */
class Cat {

    public $weight; // 重量 in kg
    public $furColor; // 毛色
    public $whiskerLength; // 鬍鬚長度
    public $maxSpeed; // 最大速度 in km/hr

    public function eat(){
        // code for eating... 
    }

    public function sleep(){
        // code for sleeping... 
    }

    public function hunt(Prey $objPrey){
        // hunt 打獵; prey 獵物
        // code for hunting objects of type Prey
        // which we will not define... 
    }

    public function purr(){
        // purr 喉音
        print "purrrrrrr..." . "\n";
    }

    public function petTheKitty(Cat $objCat){
        // petTheKitty 寵物小貓
        $objCat->purr();
    }

}
