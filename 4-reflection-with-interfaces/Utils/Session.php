<?php


use Contracts\IStorage;

class Session implements IStorage
{
    public function set(string $name, mixed $value): void
    {
        self::mbStart();
        $_SESSION[$name] = $value;
    }
    public function get(string $name): ?string
    {
        self::mbStart();
        return $_SESSION[$name] ?? null;
    }
    public function slice(string $name): ?string
    {
        self::mbStart();
        $val = null;
        if (isset($_SESSION[$name])) {
            $val = $_SESSION[$name];
            unset($_SESSION[$name]);
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
