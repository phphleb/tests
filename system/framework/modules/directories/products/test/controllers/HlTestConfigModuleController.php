<?php

namespace Products\Test\Controllers;

use Hleb\Base\Module;
use Hleb\Static\Request;
use Hleb\Static\Settings;

class HlTestConfigModuleController extends Module
{
    public function index(): string
    {
        return match (Request::get('p')->value()) {
            'main' => Settings::getParam('main', 'replace.temp'),
            'custom' => Settings::getParam('custom', 'override.levels'),
            'override' => Settings::getParam('main', 'override.var'),
            default => Settings::getParam('main', 'module.value'),
        };
    }
}
