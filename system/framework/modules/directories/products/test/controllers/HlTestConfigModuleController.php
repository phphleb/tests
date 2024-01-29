<?php

namespace Products\Test\Controllers;

use Hleb\Base\Module;
use Hleb\Static\Settings;

class HlTestConfigModuleController extends Module
{
    public function index(): string
    {
        return Settings::getParam('main', 'module.value');
    }
}
