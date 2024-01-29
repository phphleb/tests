<?php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use Hleb\Base\Event;
use Hleb\Constructor\Attributes\Dependency;

#[Dependency]
final class ModuleEvent extends Event
{
    public function before(string $class, string $method, array $arguments, string $module): array|false
    {
        return $arguments;
    }
}