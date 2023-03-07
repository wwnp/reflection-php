<?php

use Controllers\Home;
use Controllers\Shop;
use Models\Article;
use Utils\Session;

include_once('init.php');

class Container
{
    public function resolveClass(string $className)
    {
        $ref = new ReflectionClass($className);
        $contructor = $ref->getConstructor();
        $deps = [];
        if ($contructor !== null) {
            $params = $contructor->getParameters(); //  Array ( [0] => ReflectionParameter Object ( [name] => model ) )
            foreach ($params as $param) {
                $name = $param->getType()->getName(); // Article
                $deps[] = $this->resolveClass($name); // new Article()
            }
        }

        return new $className(...$deps);
    }
}
$container = new Container();
// $c->resolveClass(Shop::class);
$controller = $container->resolveClass(Home::class);
$controller->run();
// echo '<pre style="border: 1px solid #000; height: auto; overflow: auto; margin: 0.5em;">';
// echo " c <hr />";
// print_r($controller);
// echo '</pre>';
// echo '<hr>';
// $model = new Article();
// $session = new Session();

// $controller = new Shop($model, $session);
// $controller->run();
