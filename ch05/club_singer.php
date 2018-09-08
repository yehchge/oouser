<?php

/**
 * @desc 測試 class.Collection.php 回呼程式
 * @created 2018/09/08
 */

require_once("class.Collection.php");

class Singer {
    public $name;
    public function __construct($name){
        $this->name = $name;
    }
}

class NightClub {
    public $name;
    public $singers;
    public function __construct($name){
        $this->name = $name;
        $this->singers = new Collection();
        $this->singers->setLoadCallback('_loadSingers', $this);
    }

    public function _loadSingers(Collection $col){
        print "(We`re loading the singers!)<br>\n";
        // these would normally come from a database
        $col->addItem(new Singer('Frank Sinatra'));
        $col->addItem(new Singer('Dean Martin'));
        $col->addItem(new Singer('Sammy Davis, Jr.'));
    }
}

$objNightClub = new NightClub('The Sands');
print "Welcome to " . $objNightClub->name . "<br>\n";

print "We have " . $objNightClub->singers->length() . " singers " . 
        "for your listening pleasure this evening.\n"; 