<?php

namespace App\Controllers\Dir;

class Test474eff721eee4c33056ab6a4c91b522bNum2Controller extends \Hleb\Scheme\App\Controllers\MainController
{
    public function index() {
        return 'Dir:index:OK';
    }

    public function getTestVariables($test1, $test2) {
        return 'Dir:getTestVariables:' . ($test1 ?? null) . ($test2 ?? null) .'OK';
    }

    public function getMainTest() {
        return 'Dir:getMainTest:OK';
    }

}