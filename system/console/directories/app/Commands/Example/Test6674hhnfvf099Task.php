<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

/**
 * Тестирование передаваемых флагов как аргументы.
 */
class Test6674hhnfvf099Task extends Task
{
    #[\Override]
    protected function rules(): array
    {
        return [
            Arg(name: 'TestName')->label(),
        ];
    }

    protected function run(): int
    {
        $fullName = $this->getOption(name: 'TestName')->value;

        echo json_encode([
            'TestName' => is_bool($fullName) ? (int)$fullName : null,
        ]);

        return 0;
    }
}