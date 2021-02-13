<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/ControllersTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";

use PHPUnit\Framework\TestCase;

class ControllersTest extends TestCase
{
    const FILENAME = HL_FRAMEWORK_TESTS_DIR . "/resources/exc_run_script.routes_init.php";

    const KEY = '0';

    const ACTIONS = [
        1 => ['/test-controller/cnt0/', 'index:OK'],
        2 => ['/test-controller/cnt1/', 'getTestVariables:testValue1testValue2OK'],
        3 => ['/test-controller/cnt2/', 'getTestVariables:testValue1100500OK'],
        4 => ['/test-controller/cnt3/', 'index:OK[MiddlewareAfter@index]'],
        5 => ['/test-controller/cnt4/', 'index:OK[MiddlewareAfter@getTestParams]testMValue1testMValue2'],
        6 => ['/test-controller/cnt5/', 'MAIN-PAGE[MiddlewareAfter@getTestParams]testMValue1testMValue2'],
        7 => ['/test-controller/cnt6/', 'MAIN-PAGE[MiddlewareAfter@getTestParams]testMValue1100500'],
        8 => ['/test-controller/cnt7/', '[MiddlewareBefore@index][MiddlewareBefore@index]MAIN-PAGE[MiddlewareAfter@index][MiddlewareAfter@index]'],
        9 => ['/test-controller/cnt8/', '[MiddlewareBefore@index][MiddlewareBefore@getTestParams]testMbValue1testMbValue2MAIN-PAGE'],
        10 => ['/test-controller/cnt9/', '[MiddlewareBefore@getTestParams]testMbValue11testMbValue21[MiddlewareBefore@getTestParams]testMbValue1testMbValue2MAIN-PAGE'],

        11 => ['/test-compound-controller/cp0/controller/', 'index:OK'],
        12 => ['/test-compound-controller/cp0/controller2/', 'index:OK'], // error
        13 => ['/test-compound-controller/cp1/controller2/controller/', 'index:OK'],
        14 => ['/test-compound-controller/cp2/test/controller/', 'index:OK'],
        15 => ['/test-compound-controller/cp2/test2/controller/', 'index:OK'], // error
        16 => ['/test-compound-controller/cp1/0/controller/', 'index:OK'],
        17 => ['/test-compound-controller/cp3/test/controller/', 'index:OK'],
        18 => ['/test-compound-controller/cp3/0/controller/', 'index:OK'],
        19 => ['/test-compound-controller/cp4/main/test/', 'getMainTest:OK'],
        20 => ['/test-compound-controller/cp4/main2/test/', 'getMainTest:OK'], // error
        21 => ['/test-compound-controller/cp4/main/test2/', 'getMainTest:OK'], // error
        22 => ['/test-compound-controller/cp5/test/index/', 'getMainTest:OK'], // error
        23 => ['/test-compound-controller/cp5/controller/index/', 'index:OK'],

        24 => ["/test-compound-controller/cp6/test/controller/main-test/", "getMainTest:OK"],
        25 => ["/test-compound-controller/cp6/test/controller/main--test/", "getMainTest:OK"], // error
        26 => ["/test-compound-controller/cp7/dir2/", "getMainTest:OK"], // error
        27 => ["/test-compound-controller/cp7/dir/", "Dir:index:OK"],
        28 => ["/test-compound-controller/cp8/dir/test/index/", "Dir:index:OK"],
    ];
    
    public function testControllerNum1()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[1][0], "GET") === self::ACTIONS[1][1]);
    }

    public function testControllerNum2()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[2][0], "GET") === self::ACTIONS[2][1]);
    }

    public function testControllerNum3()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[3][0], "GET") === self::ACTIONS[3][1]);
    }

    public function testControllerNum4()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[4][0], "GET") === self::ACTIONS[4][1]);
    }

    public function testControllerNum5()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[5][0], "GET") === self::ACTIONS[5][1]);
    }

    public function testControllerNum6()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[6][0], "GET") === self::ACTIONS[6][1]);
    }

    public function testControllerNum7()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[7][0], "GET") === self::ACTIONS[7][1]);
    }

    public function testControllerNum8()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[8][0], "GET") === self::ACTIONS[8][1]);
    }

    public function testControllerNum9()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[9][0], "GET") === self::ACTIONS[9][1]);
    }

    public function testControllerNum10()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[10][0], "GET") === self::ACTIONS[10][1]);
    }

    public function testControllerNum11()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[11][0], "GET") === self::ACTIONS[11][1]);
    }

    public function testControllerNum12()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[12][0], "GET") === self::ACTIONS[12][1]);
    }

    public function testControllerNum13()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[13][0], "GET") === self::ACTIONS[13][1]);
    }

    public function testControllerNum14()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[14][0], "GET") === self::ACTIONS[14][1]);
    }

    public function testControllerNum15()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[15][0], "GET") === self::ACTIONS[15][1]);
    }

    public function testControllerNum16()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[16][0], "GET") === self::ACTIONS[16][1]);
    }

    public function testControllerNum17()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[17][0], "GET") === self::ACTIONS[17][1]);
    }

    public function testControllerNum18()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[18][0], "GET") === self::ACTIONS[18][1]);
    }

    public function testControllerNum19()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[19][0], "GET") === self::ACTIONS[19][1]);
    }

    public function testControllerNum20()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[20][0], "GET") === self::ACTIONS[20][1]);
    }

    public function testControllerNum21()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[21][0], "GET") === self::ACTIONS[21][1]);
    }

    public function testControllerNum22()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[22][0], "GET") === self::ACTIONS[22][1]);
    }

    public function testControllerNum23()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[23][0], "GET") === self::ACTIONS[23][1]);
    }

    public function testControllerNum24()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[24][0], "GET", self::KEY, "subd4.site.com") === self::ACTIONS[24][1]);
    }

    public function testControllerNum25()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[25][0], "GET", self::KEY, "subd4.site.com") === self::ACTIONS[25][1]);
    }

    public function testControllerNum26()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[26][0], "GET", self::KEY, "subd4.site.com") === self::ACTIONS[26][1]);
    }

    public function testControllerNum27()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[27][0], "GET", self::KEY, "subd4.site.com") === self::ACTIONS[27][1]);
    }

    public function testControllerNum28()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[28][0], "GET", self::KEY, "subd4.site.com") === self::ACTIONS[28][1]);
    }

    private function mainTestData($route = null, $method = null, $key = null, $domain = null)
    {
        if(!empty($domain) && empty($key)) {
            $key = '0';
        }
        $command = "php " . self::FILENAME . " " . $route . " " . $method . " " . $key . " " . $domain;
        $result = exec($command);
        return $result;
    }

}

