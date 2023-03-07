<?php

use Contracts\IModel;
use Contracts\IStorage;
use Controllers\Home;
use Controllers\Shop;
use Models\Article;
use Utils\Session;

include_once('init.php');

class Container
{
    protected array $binds;

    public function bind(string $type, string $subtype): void
    {
        $this->binds[$type] = $subtype;
    }

    public function resolveClass(string $className)
    {
        $ref = new ReflectionClass($className);
        $contructor = $ref->getConstructor();
        $deps = [];
        if ($contructor !== null) {
            $params = $contructor->getParameters(); //  Array ( [0] => ReflectionParameter Object ( [name] => model ) )
            foreach ($params as $param) {
                $name = $param->getType()->getName(); // Article
                if (array_key_exists($name, $this->binds)) {
                    $name = $this->binds[$name];
                }

                $deps[] = $this->resolveClass($name); // new Article()
            }
        }

        return new $className(...$deps);
    }
}
$container = new Container();
$container->bind(IModel::class, Article::class);
$container->bind(IStorage::class, Session::class);

$controller = $container->resolveClass(Home::class);
$controller->run();
