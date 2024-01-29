<?php

namespace App\Middlewares\Event;

use Hleb\Base\Middleware;

class EventMiddleware extends Middleware
{
    public function index(\DateTime $time, string $test = 'default', ?string $constructTime = null, ?int $after = null): false
    {
        echo \json_encode([
            'time' => $time->format('Y-m-d'),
            'test' => $test,
            'constructTime' => $constructTime,
            'after' => $after,
        ]);

        return false;
    }

    public function beforeAfter1(): void
    {
        echo '_AFTER_1';
    }

    public function beforeAfter2(): void
    {
        echo '_MD_AFTER_2';
    }

    public function checkMiddleware1(): void
    {
        echo '{MD-1}';
    }

    public function checkMiddleware2(): void
    {
        echo '{MD-2}';
    }

    public function checkMiddleware3(): void
    {
        echo '{MD-3}';
    }

    public function testMdEventArgs1(string $arg): void
    {
        echo "{MD_ARG-1=$arg}";
    }
}