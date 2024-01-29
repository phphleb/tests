<?php

namespace Products\Open\Controllers;

use Hleb\Base\Module;
use Hleb\Constructor\Data\View;
use Hleb\Static\Settings;

class HlTestViewModuleController extends Module
{
    public function index(): View
    {
        echo Settings::getModuleName();
        echo '_' . Settings::getParam('main', 'module.view.type') . '_';

        return view('global');
    }
}
