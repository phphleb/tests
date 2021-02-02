<?php

namespace App\Middleware\Before;

class Test6032ca1ff49c11e8a7a2b17afed6858bMiddlewareBefore extends \Hleb\Scheme\App\Middleware\MainMiddleware
{
    public function index() {

        print '[MiddlewareBefore@index]';

    }

    public function getTest() {

        print '[MiddlewareBefore@getTest]';

    }

    public function getTestParams($param1, $param2) {

        print '[MiddlewareBefore@getTestParams]' . $param1 . $param2;

    }

    public function getMainTest() {

        print '[MiddlewareBefore@getMainTest]';

    }
}
