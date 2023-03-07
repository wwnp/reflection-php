<?php

namespace Models;

use Contracts\IModel;

class Article implements IModel
{
    public function all(): array
    {
        return [
            ['id' => 1, 'title' => 'abc'],
            ['id' => 2, 'title' => 'Gew'],
            ['id' => 3, 'title' => 'Ugc'],
        ];
    }
}
