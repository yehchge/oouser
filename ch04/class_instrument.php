<?php

/**
 * @desc 樂器
 */
class Instrument {

    private $name;
    private $instruments = array();
    private $insts = array();

    function __construct($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
   
    public function add(Instrument $instrument){
        array_push($this->instruments, $instrument);
    }

    public function hasChildren(){
        return (bool)(count($this->instruments) > 0);
    }

    public function getDescription(){
        foreach($this->instruments as $inst){
            $this->insts[] = $inst;
        }
        return $this->insts;
    }

    public function showInstrument(){
        print("- one ".$this->getName()."\n");
        if($this->hasChildren()){
            print(" which includes: \n");
            foreach($this->instruments as $inst){
                print("-");
                $inst->showInstrument();
            }
        }
    }

}
