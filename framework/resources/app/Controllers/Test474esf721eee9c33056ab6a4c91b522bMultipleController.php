<?php

namespace App\Controllers;

use Hleb\Constructor\Handlers\Request;
use Hleb\Constructor\Handlers\URL;

class Test474esf721eee9c33056ab6a4c91b522bMultipleController extends \Hleb\Scheme\App\Controllers\MainController
{
    public function index() {
        return 'index:OK';
    }

    public function getRequest() {
        return 'getRequest:' . implode(':', Request::get()) .'OK';
    }

    public function getMainTest() {
        return 'getMainTest:OK';
    }

    public function getUrlByName() {
        $url = URL::getByName('multiple-route-v2', ['test1', 'test2', 'test3']);

        return $url;
    }

}