<?php

class MyClass
{
    public $property  = 5;
    public $property3  = 25;
    public $property2  = 15;
    public $property5  = 55;
    public function myMethod($arg1, $arg2)
    {
        return $arg1 + $arg2;
    }
}

// Create a new ReflectionClass instance for MyClass
$reflection = new ReflectionClass('MyClass');

// Get a list of the properties defined in MyClass
$properties = $reflection->getProperties();
foreach ($properties as $property) {
    echo $property->getName() . ":" . $property->getValue(new MyClass()) . "\n";
}
