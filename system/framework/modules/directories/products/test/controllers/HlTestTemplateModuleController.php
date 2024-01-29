<?php

namespace Products\Test\Controllers;

use Hleb\Base\Module;
use Hleb\Constructor\Data\View;

class HlTestTemplateModuleController extends Module
{
    public function index(): View
    {
        return view("example");
    }
}
