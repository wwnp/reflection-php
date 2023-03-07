<?php

namespace Utils;

class Logger
{
    public function write($msg): void
    {
        file_put_contents("log.txt", "{$msg}\n", FILE_APPEND);
    }
}
