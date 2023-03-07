<?php

use Contracts\IModel;
use Contracts\IStorage;
use Controllers\Home;

include_once("Contracts/IController.php");
include_once("Contracts/IModel.php");
include_once("Contracts/IStorage.php");
include_once("Controllers/Home.php");


class MockModel implements IModel
{
    public function all(): array
    {
        return [
            ["title" => 1, "id" => 1]
        ];
    }
}
class MockStorage implements IStorage
{
    protected array $hash = [];
    public function set(string $name, mixed $value): void
    {
        self::mbStart();
        $this->hash[$name] = $value;
    }
    public function get(string $name): ?string
    {
        self::mbStart();
        return $this->hash[$name] ?? null;
    }
    public function slice(string $name): ?string
    {
        self::mbStart();
        $val = null;
        if (isset($this->hash[$name])) {
            $val = $this->hash[$name];
            unset($this->hash[$name]);
        }

        return $val;
    }
    protected static function mbStart()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}
$mockModel = new MockModel();
$mockStorage = new MockStorage();
$controller = new Home($mockModel, $mockStorage);
$controller->run();
