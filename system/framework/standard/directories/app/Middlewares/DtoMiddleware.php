<?php

namespace App\Middlewares;

use Hleb\Base\Middleware;

class DtoMiddleware extends Middleware
{
    public function setData(): void
    {
        $data = $this->container->dto()->get('test') ?? [];
        $data[] = self::class;
        $this->container->dto()->set('test', $data);
    }

}