<?php

namespace Contracts;

interface IStorage
{
    public function set(string $name, mixed $value): void;
    public function get(string $name): ?string;
    public function slice(string $name): ?string;
}
