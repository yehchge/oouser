<?php

/**
 * @desc 測試超商收銀機 / 繼承
 */

require_once('class.SweepstakesCustomer.php');
// since this file already includes class.Customer.php, there's 
// no need to pull that file in, as well.

function greetCustomer(Customer $objCust){
    print "Welcome back to the store $objCust->name! \n";
}

// Change this value to change the class used to create this customer
// object

// 切換該值 true 或  false, true 時會顯示得獎訊息
$promotionCurrentlyRunning = true; 

if ($promotionCurrentlyRunning){
    $objCust = new SweepstakesCustomer(12345);
}else{
    $objCust = new Customer(12345);
}

greetCustomer($objCust);
