<?php

/**
 * @desc 介紹 UML 並實作一個樂隊管理物件
 */

/**
 * @desc 樂隊(Band)介面
 */
interface Band {
    public function getName();

    // Genre 類型
    public function getGenre();

    // Musician 音樂家
    public function addMusician(Musician $musician);
    public function getMusicians();
}

/**
 * @desc 音樂家(Musician)介面
 */
interface Musician {

    // Instrument 樂器
    public function addInstrument(Instrument $instrument);
    public function getInstruments();

    // assign 分配
    public function assignToBand(Band $band);
    public function getMusicianType();
}

/**
 * @desc 樂器(Instrument)介面
 */
interface Instrument {
    public function getName();
    public function getCategory();
}

/**
 * @desc 吉他手(Guitarist)
 */
class Guitarist implements Musician {
    private $last;
    private $first;
    private $musicianType;
    private $instruments;
    private $bandReference;

    function __construct($first, $last){
        $this->first = $first;
        $this->last = $last;
        $this->instruments = array();
        $this->musicianType = "guitarist";
    }

    public function getName(){
        return $this->first . " " . $this->last;
    }

    public function addInstrument(Instrument $instrument){
        array_push($this->instruments, $instrument);
    }

    public function getInstruments(){
        return $this->instruments;
    }

    public function getBand(){
        return $this->bandReference;
    }

    public function assignToBand(Band $band){
        $this->bandReference = $band;
    }

    public function getMusicianType(){
        return $this->musicianType;
    }

    public function setMusicianType($musicianType){
        $this->musicianType = $musicianType;
    }

}

/**
 * @desc 首席吉他手(LeadGuitarist)
 */
class LeadGuitarist extends Guitarist {
    function __construct($last, $first){
        parent::__construct($last, $first);
        $this->setMusicianType("lead guitarist");
    }
}

/**
 * @desc 搖滾樂隊(RockBand)
 */
class RockBand implements Band {
    private $bandName;
    private $bandGenre;
    private $musicians;

    function __construct($bandName){
        $this->bandName = $bandName;
        $this->musicians = array();
        $this->bandGenre = "rock"; // 搖滾
    }

    public function getName(){
        return $this->bandName;
    }

    public function getGenre(){
        return $this->bandGenre;
    }

    public function addMusician(Musician $musician){
        array_push($this->musicians, $musician);
        $musician->assignToBand($this);
    }

    public function getMusicians(){
        return $this->musicians;
    }
}

/**
 * @desc 吉他(Guitar)
 */
class Guitar implements Instrument {
    private $name;
    private $category;

    function __construct($name){
        $this->name = $name;
        $this->category = "guitar";
    }

    public function getName(){
        return $this->name;
    }
    
    public function getCategory(){
        return $this->category;
    }
}

// Test Objects
$band = new RockBand("The Variables");
$bandMemberA = new Guitarist("Jack", "Float");
$bandMemberB = new LeadGuitarist("Jim", "Integer");

$bandMemberA->addInstrument(new Guitar("Gibson Les Paul"));
$bandMemberB->addInstrument(new Guitar("Fender Stratocaster"));
$bandMemberB->addInstrument(new Guitar("Hondo H-77"));

$band->addMusician($bandMemberA);
$band->addMusician($bandMemberB);

foreach($band->getMusicians() as $musician){
    echo "Musician " . $musician->getName() . "\n";
    echo "is the " . $musician->getMusicianType() . "\n";
    echo "in the " . $musician->getBand()->getGenre() . " band \n";
    echo "called " . $musician->getBand()->getName() . "\n";

    foreach($musician->getInstruments() as $instrument){
        echo "And plays the " . $instrument->getName() . " ";
        echo $instrument->getCategory() . "\n";
    }
    echo "\r\n";
}
