<?php

namespace Modules\Example\Controllers;

use Hleb\Base\Module;

class ExampleModuleController extends Module
{
    public function get(): string
    {
        return 'MODULE-EXAMPLE-SUCCESS';
    }
}
