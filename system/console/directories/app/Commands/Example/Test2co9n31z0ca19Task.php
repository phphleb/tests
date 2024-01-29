<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

/**
 * Базовая проверка установки нескольких правил.
 */
class Test2co9n31z0ca19Task extends Task
{
    #[\Override]
    protected function rules(): array
    {
        return [
            Arg(name: 'Name1')->short(name: 'N1')->default(value: 'arg-name1'),
            Arg(name: 'Name2')->short(name: 'N2')->default(value: 'arg-name2'),
            Arg(name: 'Name3')->short(name: 'N3')->default(value: 'arg-name3'),
        ];
    }

    protected function run(): int
    {
        $name1 = $this->getOption(name: 'Name1')->asString(default: 'value-name1');
        $name2 = $this->getOption(name: 'Name2')->asString(default: 'value-name2');
        $name3 = $this->getOption(name: 'Name3')->asString(default: 'value-name3');

        echo $name1 . ':' . $name2 . ':' . $name3;

        return 0;
    }
}