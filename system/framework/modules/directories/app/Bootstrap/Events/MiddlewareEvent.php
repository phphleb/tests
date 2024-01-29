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
        return $arguments;
    }
}