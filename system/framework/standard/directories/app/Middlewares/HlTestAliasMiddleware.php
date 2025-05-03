<?php

namespace App\Middlewares;

use Hleb\Base\Middleware;

class HlTestAliasMiddleware extends Middleware
{
    public function index(): void
    {
        echo 'ALIAS-M8E_';
    }
}
