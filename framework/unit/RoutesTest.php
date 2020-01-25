<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/RoutesTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/DeterminantStaticUncreated.php";

use PHPUnit\Framework\TestCase;

class RoutesTest extends TestCase
{
    const FILENAME = HL_FRAMEWORK_TESTS_DIR . "/resources/exc_run_script.routes_init.php";

    const KEY = "00a9752fec4e1001765bda1e2e264388";

    const ACTIONS = [
        1 => ["/", "MAIN-PAGE"],
        2 => ["/test/", "MAIN-TEST"],
        3 => ["/test-2/var1/", "TEST-VARIABLE"],
        4 => ["/test-2/var2/", "TEST-VARIABLE"],
        5 => ["/test-3/12345/", "TEST-VARIABLE-WHERE-NUMERIC"],
        6 => ["/test-3/1abc/", "TEST-VARIABLE-WHERE-NUMERIC"], // false
        7 => ["/test-3/12345/plus/", "TEST-VARIABLE-WHERE-NUMERIC"], // false
        8 => ["/test-4/1abc/", "TEST-VARIABLE-?"],
        9 => ["/test-4/", "TEST-VARIABLE-?"],
        10 => ["/test-5/part1/part2/", "TEST-DOUBLE-VARIABLE"],
        11 => ["/test-6/12345/abc/", "TEST-DOUBLE-VARIABLE-WHERE-NUMERIC-AND-ABC"],
        12 => ["/test-6/abc/12345/", "TEST-DOUBLE-VARIABLE-WHERE-NUMERIC-AND-ABC"], // false
        13 => ["/test-6/12345/", "TEST-DOUBLE-VARIABLE-WHERE-NUMERIC-AND-ABC"], // false
        14 => ["/test-6/12345/abc/plus/", "TEST-DOUBLE-VARIABLE-WHERE-NUMERIC-AND-ABC"], // false
        15 => ["/test-7-prefix/test-7/", "TEST-MAIN-PREFIX"],
        16 => ["/test-7-prefix/", "TEST-MAIN-PREFIX"], // false
        17 => ["/test-7/", "TEST-MAIN-PREFIX"], // false
        18 => ["/test-8/", "TEST-MAIN-TYPE-POST"],
        19 => ["/test-9/1/", "TEST-GET-TYPE-POST-1"],
        20 => ["/test-9/2/", "TEST-GET-TYPE-POST-2"],
        21 => ["/test-9/3/", "TEST-GET-TYPE-POST-3"],
        22 => ["/test-9/4/", "TEST-GET-TYPE-POST-4"],
        23 => ["/test-10-prefix/test-10/1/", "TEST-MAIN-GROUP-1"],
        24 => ["/test-10-prefix/test-10/2/", "TEST-MAIN-GROUP-2"],
        25 => ["/test-10/1/", "TEST-MAIN-GROUP-1"], // false
        26 => ["/test-7-prefix-1/test-7-prefix-2/test-7/", "TEST-MAIN-DOUBLE-PREFIX"],
        27 => ["/test-11-prefix/test-11-prefix-2/test-11-group/1/", "TEST-IN-GROUP-1"],
        28 => ["/test-11-prefix/test-11-prefix-2/test-11-group/2/", "TEST-IN-GROUP-2"],
        29 => ["/test-11-prefix/test-11-group/3/", "TEST-IN-GROUP-3"],
        30 => ["/test-12-1/test-12-2/a3/", "TEST-NAMED-GROUP-1"],
        31 => ["/test-12-1/test-12-2/b3/", "TEST-NAMED-GROUP-2"],
        32 => ["/test-12-2/test-12-3/", "TEST-NAMED-GROUP-3"],
        33 => ["/test-13-pro/", "Protected from CSRF"],
        34 => ["/test-13-pro/", "TEST-PROTECTED-1"],
        35 => ["/test-14/1/", "Protected from CSRF"],
        36 => ["/test-14/1/", "TEST-GET-PROTECT-1"],
        37 => ["/test-14/2/", "Protected from CSRF"], // false
        38 => ["/test-14/2/", "TEST-GET-PROTECT-2"],
        39 => ["/test-14/3/", "Protected from CSRF"],
        40 => ["/test-14/3/", "TEST-GET-PROTECT-3"],
    ];


    // Проверка главной страницы
    public function testMainPage()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[1][0], "GET") === self::ACTIONS[1][1]);
    }

    // Проверка роутинга базового
    public function testBaseRoute()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[2][0], "GET") === self::ACTIONS[2][1]);
    }

    // Проверка вариативного добавления /{variable}/
    public function testVariableRoute()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[3][0], "GET") === self::ACTIONS[3][1]);
    }

    // Проверка вариативного добавления /{variable}/ 2
    public function testVariableRoute2()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[4][0], "GET") === self::ACTIONS[4][1]);
    }

    // Проверка вариативного добавления /{variable}/ c условием [0-9]+
    public function testVariableRouteWhereNumeric1()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[5][0], "GET") === self::ACTIONS[5][1]);
    }

    // Проверка вариативного добавления /{variable}/ c условием [0-9]+ c неправильным значением
    public function testVariableRouteWhereNumeric2()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[6][0], "GET") === self::ACTIONS[6][1]);
    }

    // Проверка вариативного добавления /{variable}/ c условием [0-9]+ c добавочным неправильным значением
    public function testVariableRouteWhereNumeric3()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[7][0], "GET") === self::ACTIONS[7][1]);
    }

    // Проверка вариативного добавления /{variable?}/
    public function testVariableRouteVariable1()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[8][0], "GET") === self::ACTIONS[8][1]);
    }

    // Проверка вариативного добавления /{variable?}/ c отсутствием значения
    public function testVariableRouteVariable2()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[9][0], "GET") === self::ACTIONS[9][1]);
    }

    // Проверка вариативного добавления /{variable1}/{variable2}/
    public function testDoubleVariable1()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[10][0], "GET") === self::ACTIONS[10][1]);
    }

    // Проверка маршрута /{variable1}/{variable2}/
    public function testDoubleVariable2()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[11][0], "GET") === self::ACTIONS[11][1]);
    }

    // Проверка маршрута /{variable1}/{variable2}/ с неправильным значением частей
    public function testDoubleVariable3()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[12][0], "GET") === self::ACTIONS[12][1]);
    }

    // Проверка маршрута /{variable1}/{variable2}/ с недостающей частью
    public function testDoubleVariable4()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[13][0], "GET") === self::ACTIONS[13][1]);
    }

    // Проверка маршрута /{variable1}/{variable2}/ с лишней частью
    public function testDoubleVariable5()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[14][0], "GET") === self::ACTIONS[14][1]);
    }

    // Проверка префикса
    public function testPrefix1()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[15][0], "GET") === self::ACTIONS[15][1]);
    }

    // Проверка префикса - отсутствие части 2
    public function testPrefix2()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[16][0], "GET") === self::ACTIONS[16][1]);
    }

    // Проверка маршрута с POST-доступом
    public function testMethodType()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[18][0], "POST") === self::ACTIONS[18][1]);
    }

    // Проверка маршрута с POST-доступом, но запрос через GET
    public function testMethodType2()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[18][0], "GET") === self::ACTIONS[18][1]);
    }

    // Проверка маршрута с POST-доступом
    public function testMethodType3()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[19][0], "POST") === self::ACTIONS[19][1]);
    }

    // Проверка маршрута с POST-доступом, но запрос через GET
    public function testMethodType4()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[19][0], "GET") === self::ACTIONS[19][1]);
    }

    // Проверка маршрута с GET-доступом
    public function testMethodType5()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[20][0], "GET") === self::ACTIONS[20][1]);
    }

    // Проверка маршрута с GET-доступом, но запрос через POST
    public function testMethodType6()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[20][0], "POST") === self::ACTIONS[20][1]);
    }

    // Проверка маршрута с POST-доступом
    public function testMethodType7()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[21][0], "POST") === self::ACTIONS[21][1]);
    }

    // Проверка маршрута с POST-доступом, но запрос через GET
    public function testMethodType8()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[21][0], "GET") === self::ACTIONS[21][1]);
    }

    // Проверка маршрута с GET-доступом и  POST-доступом
    public function testMethodType9()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[22][0], "GET") === self::ACTIONS[22][1]);
    }

    // Проверка маршрута с GET-доступом и  POST-доступом
    public function testMethodType10()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[22][0], "POST") === self::ACTIONS[22][1]);
    }

    // Проверка группы с префиксом
    public function testGroupByPrefix1()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[23][0], "GET") === self::ACTIONS[23][1]);
    }

    // Проверка группы с префиксом
    public function testGroupByPrefix2()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[24][0], "GET") === self::ACTIONS[24][1]);
    }

    // Проверка группы с префиксом, неправильное значение
    public function testGroupByPrefix3()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[25][0], "GET") === self::ACTIONS[25][1]);
    }

    // Проверка двойного префикса
    public function testPrefix3()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[26][0], "GET") === self::ACTIONS[26][1]);
    }

    // Проверка вложенных групп с префиксом
    public function testGroupByPrefix4()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[27][0], "GET") === self::ACTIONS[27][1]);
    }

    // Проверка вложенных групп с префиксом
    public function testGroupByPrefix5()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[28][0], "GET") === self::ACTIONS[28][1]);
    }

    // Проверка вложенных групп с префиксом
    public function testGroupByPrefix6()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[29][0], "GET") === self::ACTIONS[29][1]);
    }

    // Проверка именованных вложенных групп с префиксом
    public function testNamedGroupByPrefix1()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[30][0], "GET") === self::ACTIONS[30][1]);
    }

    // Проверка именованных вложенных групп с префиксом
    public function testNamedGroupByPrefix2()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[31][0], "GET") === self::ACTIONS[31][1]);
    }

    // Проверка именованных вложенных групп с префиксом
    public function testNamedGroupByPrefix3()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[32][0], "GET") === self::ACTIONS[32][1]);
    }

    // Проверка защиты маршрута
    public function testProtected1()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[33][0], "GET") === self::ACTIONS[33][1]);
    }

    // Проверка защиты маршрута 2
    public function testProtected2()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[34][0], "GET", self::KEY) === self::ACTIONS[34][1]);
    }

    // Проверка защиты маршрута
    public function testProtected3()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[35][0], "GET") === self::ACTIONS[35][1]);
    }

    // Проверка защиты маршрута 2
    public function testProtected4()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[36][0], "GET", self::KEY) === self::ACTIONS[36][1]);
    }

    // Проверка защиты маршрута
    public function testProtected5()
    {
        $this->assertFalse(self::mainTestData(self::ACTIONS[37][0], "GET") === self::ACTIONS[37][1]);
    }

    // Проверка защиты маршрута 2
    public function testProtected6()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[38][0], "GET") === self::ACTIONS[38][1]);
    }

    // Проверка защиты маршрута
    public function testProtected7()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[39][0], "GET") === self::ACTIONS[39][1]);
    }

    // Проверка защиты маршрута 2
    public function testProtected8()
    {
        $this->assertTrue(self::mainTestData(self::ACTIONS[40][0], "GET", self::KEY) === self::ACTIONS[40][1]);
    }

    private function mainTestData($route = null, $method = null, $key = null)
    {
        $command = "php " . self::FILENAME . " " . $route . " " . $method . " " . $key;
        $result = exec($command);
        //var_dump($result);
        return $result;
    }
}


