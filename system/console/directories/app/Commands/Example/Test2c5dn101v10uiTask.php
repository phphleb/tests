<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

/**
 * Базовая проверка установки правил.
 */
class Test2c5dn101v10uiTask extends Task
{
    #[\Override]
    protected function rules(): array
    {
        return [
            Arg(name: 'Name')->short(name: 'N')->default(value: 'arg-test-undefined'),
        ];
    }

    protected function run(): int
    {
        echo $this->getOption(name: 'Name')->asString(default: 'value-test-undefined');

        return 0;
    }
}