<?php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use Hleb\Base\Event;
use Hleb\Constructor\Attributes\Dependency;

#[Dependency]
final class ControllerEvent extends Event
{
    public function before(string $class, string $method, array $arguments): array|false
    {
        return $arguments;
    }
}