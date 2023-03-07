<?php

// use Controllers\Home;

use Controllers\Home;

include_once("./init_tests.php");
// include_once("../Controllers/Home.php");
// include_once("../Models/Article.php");
// include_once("../Models/Article.php");

class Container
{
    public function resolveClass(string $className)
    {
        $deps = [];

        $reflection = new ReflectionClass($className);
        $constructor = $reflection->getConstructor();
        if ($constructor !== null) {
            $params = $constructor->getParameters();
            foreach ($params as $param) {
                $name = $param->getType()->getName();
                $deps[] = $this->resolveClass($name);
            }
        }
        return new $className(...$deps);
    }
}


$container = new Container();
$controller = $container->resolveClass(Home::class);
$controller->run();
