<?php

namespace App\Controllers;

class Test474eff721eee4c33056ab6a4c91b522bNum1Controller extends \Hleb\Scheme\App\Controllers\MainController
{
    public function index() {
        return 'index:OK';
    }

    public function getTestVariables($test1, $test2) {
        return 'getTestVariables:' . ($test1 ?? null) . ($test2 ?? null) .'OK';
    }

    public function getMainTest() {
        return 'getMainTest:OK';
    }

}