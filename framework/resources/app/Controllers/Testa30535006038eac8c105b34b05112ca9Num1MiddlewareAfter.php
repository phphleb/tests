<?php

namespace App\Middleware\After;

class Testa30535006038eac8c105b34b05112ca9Num1MiddlewareAfter extends \Hleb\Scheme\App\Middleware\MainMiddleware
{
    public function index() {

        print '[MiddlewareAfter@index]';

    }

    public function getTest() {

        print '[MiddlewareAfter@getTest]';

    }

    public function getTestParams($param1, $param2) {

        print '[MiddlewareAfter@getTestParams]' . $param1 . $param2;

    }

    public function getMainTest() {

        print '[MiddlewareAfter@getMainTest]';

    }
}
