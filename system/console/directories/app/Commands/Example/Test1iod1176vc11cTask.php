<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

/**
 * Базовая проверка местоположения класса команды и последующий вывод ошибки.
 */
class Test1iod1176vc11cTask extends Task
{
    protected function run()
    {
        // Возвращает код `ошибки`.
        return 1;
    }
}