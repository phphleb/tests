<?php

declare(strict_types=1);

namespace App\Commands\Example;

use Hleb\Base\Task;

/**
 * Проверка сокращённых именований.
 */
class Test4c54h11f0c020Task extends Task
{
    #[\Override]
    protected function rules(): array
    {
        return [
            Arg(name: 'Name')->short(name: 'N1')->short('N2'),
        ];
    }

    protected function run(): int
    {
        echo $this->getOption(name: 'Name')->value ?? $this->getOption(name: 'N1')->value ?? $this->getOption(name: 'N2')->value;

        return 0;
    }
}