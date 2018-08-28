<?php

/**
 * @desc test call_user_func
 * @created 2018/08/28
 */

class Bar {

    private $_foo;

    public function __construct($fooVal){
        $this->_foo = $fooVal;
    }

    public function printFoo(){
        print $this->_foo."\n";
    }

    public static function sayHello($name){
        print "Hello there, $name!\n";
    }

}

// procedural function - not part of the Bar class
function printCount($start, $end){
    for($x = $start; $x <= $end; $x++){
        print "$x ";
    }
    print "\n";
}

//prints 1 2 3 4 5 6 7 8 9 10
call_user_func('printCount', 1, 10); /* ex. 1 */

//calls $objBar->printFoo()
$objBar = new Bar('elephant');
call_user_func(array($objBar, 'printFoo')); /* ex. 2 */

//calls Bar::sayHello('Steve')
call_user_func(array('Bar', 'sayHello'), 'Steve'); /* ex. 3 */

//This throws a fatal error "Using $this when not
//in object context" because the function call
//is Bar::printFoo, which is not a static method
// 下面這行一定會錯, 如果介意, 可以把它註解起來
call_user_func(array('Bar', 'printFoo')); /* ex. 4 */
