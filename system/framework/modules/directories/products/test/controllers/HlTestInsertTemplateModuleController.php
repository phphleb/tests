<?php

namespace Products\Test\Controllers;

use Hleb\Base\Module;
use Hleb\Constructor\Data\View;

class HlTestInsertTemplateModuleController extends Module
{
    public function index(): View
    {
        return view("nested");
    }
}
