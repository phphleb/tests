<?php

namespace App\Middlewares\Dir;

use Hleb\Base\Middleware;
use Hleb\Static\Response;

class NestedMiddleware extends Middleware
{
    public function index(): void
    {
        echo 'NESTED-M8E-INDEX_';
    }

    public function example(): void
    {
        echo 'M8E-N4D_';
    }

    public function first(): void
    {
        echo 'M8E-N4D1_';
    }

    public function second(): void
    {
        echo 'M8E-N4D2_';
    }

    public function afterFirst(): void
    {
        Response::addToBody('_M8E-A1');
    }

    public function afterSecond(): void
    {
        Response::addToBody('_M8E-A2');
    }
}