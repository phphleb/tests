<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

/**
 * Тестирование ограничений для значений аргументов.
 */
class Test85t4h14fvr090Task extends Task
{
    #[\Override]
    protected function rules(): array
    {
        return [
            Arg(name: 'StringName1')->short('SN1')->string(5, 10),
            Arg(name: 'StringName2')->short('SN2')->string(5),
            Arg(name: 'IntegerName1')->short('IN1')->integer(10, 25),
            Arg(name: 'IntegerName2')->short('IN2')->integer(10),
            Arg(name: 'NumberName1')->short('NN1')->number(10.5, 25.5),
            Arg(name: 'NumberName2')->short('NN2')->number(10.5),
            Arg(name: 'ListName1')->short('LN1')->list(3, 5),
            Arg(name: 'ListName2')->short('LN2')->list(3),
        ];
    }

    protected function run(): int
    {
        echo json_encode(array_filter([
            'StringName1' => $this->getOption(name: 'StringName1')?->value,
            'StringName2' => $this->getOption(name: 'StringName2')?->value,
            'IntegerName1' => $this->getOption(name: 'IntegerName1')?->value,
            'IntegerName2' => $this->getOption(name: 'IntegerName2')?->value,
            'NumberName1' => $this->getOption(name: 'NumberName1')?->value,
            'NumberName2' => $this->getOption(name: 'NumberName2')?->value,
            'ListName1' => $this->getOption(name: 'ListName1')?->value,
            'ListName2' => $this->getOption(name: 'ListName2')?->value,
        ]));

        return 0;
    }
}