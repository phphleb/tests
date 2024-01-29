<?php

namespace App\Middlewares;

use Hleb\Base\Middleware;
use Hleb\Static\Response;
use Hleb\Static\Router;

class HlTestExampleMiddleware extends Middleware
{
    public function index(): void
    {
        echo 'EXAMPLE-M8E-INDEX_';
    }

    public function after(): void
    {
        Response::addToBody('_EXAMPLE-M8E-INDEX');
    }

    public function example(): void
    {
        echo 'M8E-E5E_';
    }

    public function error(): false
    {
        return false;
    }

    public function getData(): string
    {
        $data = Router::data();
        if (isset($data['param1'], $data['param2'])) {
            return $data['param1'] . '_' . $data['param2'] . '_';
        }
        return '';
    }

    public function getJson(): array
    {
        return ['test' => 'data'];
    }

    public function getInt(): int
    {
        return 100500;
    }
}