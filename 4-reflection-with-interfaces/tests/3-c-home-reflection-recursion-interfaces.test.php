<?php

use Controllers\Home;

include_once("./init_tests.php");

class Container
{
    protected array $binds = [];

    public function bind(string $whatBind, string $toBind): void
    {
        $this->binds[$whatBind] = $toBind;
    }

    public function resolveClass(string $className)
    {
        $deps = [];

        $reflection = new ReflectionClass($className);
        $constructor = $reflection->getConstructor();
        if ($constructor !== null) {
            $params = $constructor->getParameters();
            foreach ($params as $param) {
                $name = $param->getType()->getName();
                if (array_key_exists($name, $this->binds)) {
                    $name = $this->binds[$name];
                }
                $deps[] = $this->resolveClass($name);
            }
        }
        return new $className(...$deps);
    }
}

$container = new Container();
$container->bind(IModel::class, Article::class);
$controller = $container->resolveClass(Home::class);
$controller->run();
