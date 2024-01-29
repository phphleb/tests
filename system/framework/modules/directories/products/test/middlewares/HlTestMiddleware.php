<?php

namespace Products\Test\Middlewares;

use Hleb\Base\Module;

class HlTestMiddleware extends Module
{
    public function index(): void
    {
        echo "TEST-MIDDLEWARE-MODULE_";
    }
}
