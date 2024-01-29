<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;
use Hleb\Reference\LogReference;

/**
 * Базовая проверка местоположения класса команды и последующий вывод ошибки.
 */
class Testdi2d2106vc6cTask extends Task
{
    public function __construct(
        readonly private \DateTime    $time,
        readonly private LogReference $log,
        array                         $config = []
    )
    {
        parent::__construct($config);
    }

    protected function run(): void
    {
        echo json_encode([
            'log' => $this->log::class,
            'time' => $this->time::class,
        ]);
    }
}