<?php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use DateTime;
use Hleb\Base\Event;
use Hleb\Constructor\Attributes\Dependency;
use Modules\ExampleTest\Controllers\Event\EventModuleController;

#[Dependency]
final class ModuleEvent extends Event
{
    public function __construct(private readonly DateTime $time, array $config = [])
    {
        parent::__construct($config);
    }

    public function before(string $class, string $method, array $arguments, ?string $module): array|false
    {
        if ($class === EventModuleController::class && $method === 'index') {
            $arguments = [
                'time' => DateTime::createFromFormat('Y-m-d', '1970-12-12'),
                'test' => 'changed',
                'constructTime' => $this->time::class,
                'module' => $module,
            ];
        }

        if ($class === EventModuleController::class && $method === 'eventAfterOnce2') {
            echo "EVENT_BEFORE-2_{$module}_";
        }
        if ($class === EventModuleController::class && $method === 'eventArgs1') {
            return ['arg' => '[arg]'];
        }

        return $arguments;
    }

    public function after(string $class, string $method, string $module, mixed &$result): bool
    {
        if ($class === EventModuleController::class && $method === 'eventAfterOnce1') {
            echo 'EVENT_AFTER-1_';
        }
        if ($class === EventModuleController::class && $method === 'eventAfterOnce2') {
            echo "EVENT_AFTER-2_{$module}_";
        }

        return true;
    }
}