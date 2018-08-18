<?php

/**
 * @desc 超市的收銀機客戶
 */

class Customer {
    public $id;
    public $customerNumber;
    public $name;

    public function __construct($customerID){
        // fetch customer infomation from the database
        //
        //We're hard codeing these values here, but in a real application
        //these values would come from a database
        $data = array();
        $data['customerNumber'] = 10000000;
        $data['name'] = 'Jane Johnson';

        // Assign the values from the database to this object
        $this->id = $customerID;
        $this->name = $data['name'];
        $this->customerNumber = $data['customerNumber'];
    }
}
