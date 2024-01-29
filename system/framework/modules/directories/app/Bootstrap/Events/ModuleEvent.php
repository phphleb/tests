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

    public function before(string $class, string $method, array $arguments, string $module): array|false
    {
        if ($class === EventModuleController::class && $method === 'index') {
            $arguments = [
                'time' => DateTime::createFromFormat('Y-m-d', '1970-12-12'),
                'test' => 'changed',
                'constructTime' => $this->time::class,
                'module' => $module,
            ];
        }
        return $arguments;
    }
}