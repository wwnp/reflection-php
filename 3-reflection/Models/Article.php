<?php

namespace Models;

use Contracts\IModel;
use Utils\Logger;

class Article implements IModel
{
    protected Logger $logger;
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }
    public function all(): array
    {
        $this->logger->write("msg 1qqwe123123");
        return [
            ['id' => 1, 'title' => 'abc'],
            ['id' => 2, 'title' => 'Gew'],
            ['id' => 3, 'title' => 'Ugc'],
        ];
    }
}
