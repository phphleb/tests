<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

/**
 * Проверка установки различных правил для обязательных значений и необязательных.
 */
class Test3co9m31z0c019Task extends Task
{
    #[\Override]
    protected function rules(): array
    {
        return [
            Arg(name: 'IntegerRequiredName1')->short(name: 'N1')->required()->integer(),
            Arg(name: 'NumberRequiredName2')->short(name: 'N2')->required()->number(),
            Arg(name: 'ListRequiredName3')->short(name: 'N3')->required()->list(),
            Arg(name: 'StringRequiredName4')->short(name: 'N4')->required()->string(),

            Arg(name: 'IntegerName5')->short(name: 'N5')->integer(),
            Arg(name: 'NumberName6')->short(name: 'N6')->number(),
            Arg(name: 'ListName7')->short(name: 'N7')->list(),
            Arg(name: 'StringName8')->short(name: 'N8')->string(),
        ];
    }

    protected function run(): int
    {
        echo json_encode([
            'IntegerRequiredName1' => $this->getOption(name: 'IntegerRequiredName1')->value,
            'NumberRequiredName2' => $this->getOption(name: 'NumberRequiredName2')->value,
            'ListRequiredName3' => $this->getOption(name: 'ListRequiredName3')->value,
            'StringRequiredName4' => $this->getOption(name: 'StringRequiredName4')->value,
            'IntegerName5' => $this->getOption(name: 'IntegerName5')->asInt(default: 1),
            'NumberName6' => $this->getOption(name: 'NumberName6')->asFloat(default: 1.1),
            'ListName7' => $this->getOption(name: 'ListName7')->asArray(default: []),
            'StringName8' => $this->getOption(name: 'StringName8')->asString(default: '100500'),
        ]);

        return 0;
    }
}