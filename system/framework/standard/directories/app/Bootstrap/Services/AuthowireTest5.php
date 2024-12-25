<?php

namespace App\Bootstrap\Services;

use Hleb\Constructor\Attributes\Autowiring\NoAutowire;

#[NoAutowire]
class AuthowireTest5 implements AutowireTestInterface
{
    public function getTag(): string
    {
        return '5';
    }
}
