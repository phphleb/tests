<?php

namespace Modules\ExampleTest\Controllers\FolderName;

use Hleb\Base\Module;

class NamedModuleController extends Module
{
    public function nameModuleGetName(): string
    {
        return 'MODULE-CHECK-NAMED-CONTROLLER-SUCCESS';
    }
}
