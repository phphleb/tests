<?php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use App\Middlewares\Event\EventMiddleware;
use DateTime;
use Hleb\Base\Event;
use Hleb\Constructor\Attributes\Dependency;

#[Dependency]
final class MiddlewareEvent extends Event
{
    public function __construct(private readonly DateTime $time, array $config = [])
    {
        parent::__construct($config);
    }

    public function before(string $class, string $method, array $arguments, bool $after): array|false
    {
        if ($class === EventMiddleware::class && $method === 'index') {
            $arguments = [
                'time' => DateTime::createFromFormat('Y-m-d', '1970-10-10'),
                'test' => 'changed',
                'constructTime' => $this->time::class,
                'after' => (int)$after,
            ];
        }
        if ($class === EventMiddleware::class && $method === 'checkMiddleware1') {
            echo '{EV-MD-1-BEFORE=' . intval($after) . '}';
        }
        if ($class === EventMiddleware::class && $method === 'checkMiddleware2') {
            echo '{EV-MD-2-BEFORE=' . intval($after) . '}';
        }
        if ($class === EventMiddleware::class && $method === 'checkMiddleware3') {
            echo '{EV-MD-3-BEFORE=' . intval($after) . '}';
        }
        if ($class === EventMiddleware::class && $method === 'testMdEventArgs1') {
            return ['arg' => '{arg}'];
        }
        return $arguments;
    }

    public function after(string $class, string $method, bool $after, mixed &$result): bool
    {
        if ($class === EventMiddleware::class && $method === 'beforeAfter1') {
            echo '_AFTER_EVENT_1_' . $after;
        }
        if ($class === EventMiddleware::class && $method === 'beforeAfter2') {
            echo '_AFTER_EVENT_2_' . $after;
        }
        if ($class === EventMiddleware::class && $method === 'checkMiddleware1') {
            echo '{EV-MD-1-AFTER=' . intval($after) . '}';
        }
        if ($class === EventMiddleware::class && $method === 'checkMiddleware2') {
            echo '{EV-MD-2-AFTER=' . intval($after) . '}';
        }
        if ($class === EventMiddleware::class && $method === 'checkMiddleware3') {
            echo '{EV-MD-3-AFTER=' . intval($after) . '}';
        }
        return true;
    }
}