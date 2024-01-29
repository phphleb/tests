<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

/**
 * Тестирование неименованных аргументов вместе с именованными.
 */
class Test7u1412mmvi001Task extends Task
{
    #[\Override]
    protected function rules(): array
    {
        return [
            Arg(name: 'TestName'),
        ];
    }

    protected function run(
        int        $integerValue = 0,
        float      $floatValue = 0.0,
        int|string $differentValue = 0,
        int        $testValue = 0
    ): int
    {
        $namedArgument = $this->getOption(name: 'TestName')->value;
        echo json_encode([
            'integerValue' => $integerValue,
            'floatValue' => $floatValue,
            'differentValue' => $differentValue,
            'testValue' => $testValue,
            'TestName' => $namedArgument,
        ]);

        return 0;
    }
}