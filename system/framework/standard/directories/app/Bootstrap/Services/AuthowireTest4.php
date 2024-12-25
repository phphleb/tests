<?php

namespace App\Bootstrap\Services;

use Hleb\Constructor\Attributes\Autowiring\AllowAutowire;

#[AllowAutowire]
class AuthowireTest4 implements AutowireTestInterface
{
    public function getTag(): string
    {
        return '4';
    }
}
