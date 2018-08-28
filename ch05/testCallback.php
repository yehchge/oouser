<?php

$myFunc = "pow";
print $myFunc(4, 2)."\n"; // prints 16, or pow(4, 2)

class Person {

    public function sayHello(){
        print "Hello!\n";
    }
}

$myMethod = 'sayHello';
$obj = new Person();
$obj->$myMethod();
