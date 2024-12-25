<?php

namespace App\Bootstrap\Services;

class AuthowireTest1 implements AutowireTestInterface
{

    public function getTag(): string
    {
        return '1';
    }
}
