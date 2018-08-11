<?php

/**
 * @desc 超市收銀機的抽獎活動客戶
 */

require_once('class.Customer.php');

class SweepstakesCustomer extends Customer {
    public function __construct($customerID){
        parent::__construct($customerID);

        if($this->customerNumber == 10000000){
            // supply 供應, frozen 冷凍, sticks 枝
            print "Congratulations $this->name! You're our millionth customer! " . 
                "You win a year's supply of frozen fish sticks! \n";
        }
    }
}
