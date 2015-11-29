<?php

class store {

	public $name;
	public $number;
	
	/*
	public function get($name){
		return $this->$name;
	}
	
	public function set($name, $value){
		$this->$name = $value;
	}
	*/

}

$aa = new store();
$aa->name = "tom";
$aa->age = 12;

echo $aa->name;
echo $aa->age;
//$aa->set("tom", 12);
//$aa->set("mary", 52);

//echo $aa->get("tom");
//echo $aa->get("mary");
//echo $aa->get("wss");




/* End of File */