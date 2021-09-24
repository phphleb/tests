<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/RequestTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Request.php";

use PHPUnit\Framework\TestCase;

use Hleb\Constructor\Handlers\Request;

class RequestTest extends TestCase
{
    const TEST_NAME1 = "test";
    const TEST_VALUE1 = "test_value";
    const TEST_NAME2 = "test2";
    const TEST_VALUE2 = 100500;
    const TEST_NAME3 = "test3";
    const TEST_VALUE3 = "test3";
    const FILENAME = HL_FRAMEWORK_TESTS_DIR . "/resources/exc_run_script.request_method.php";
    const START_COOKIE = ["C1" => "100", "C2" => "200"];
    const NEW_COOKIE = ["C1" => "101", "C2" => "201", "C3" => "301"];
    const START_SESSION = ["S1" => "1100", "S2" => "1200"];
    const NEW_SESSION = ["S1" => "1101", "S2" => "1201", "S3" => "1301"];
    const GET = ["GET1"=>"GET100", "GET2"=>"<script>alert('H');</script>GET200", "GET3" => 8888, "GET4" => 88.88, "GET5" => -8888];
    const POST = ["POST1"=>"POST100", "POST2"=>"<script>alert('H');</script>POST200", "POST3"=> 9999, "POST4"=> 99.99, "POST5"=> -9999];
    const REQUEST = ["REQUEST1" => "REQUEST100", "REQUEST2" => "<script>alert('H');</script>REQUEST200", "REQUEST3" => 10001, "REQUEST4" => 1000.1, "REQUEST5" => -10001];


    // Проверка, правильно ли заносятся значения
    public function testAddAndGet()
    {
        Request::add(self::TEST_NAME1, self::TEST_VALUE1);
        $this->assertTrue(Request::get(self::TEST_NAME1) === self::TEST_VALUE1);
    }

    // Проверка, правильно и заносятся числовые значения
    public function testSecondAddAndGetNumeric()
    {
        Request::add(self::TEST_NAME2, self::TEST_VALUE2);
        $this->assertTrue(Request::get(self::TEST_NAME2) === (double) self::TEST_VALUE2);
    }

    // Проверка на вторичное значение сессии
    public function testSecondSesion()
    {
        $this->assertTrue( self::mainTestData("getSession", "S1") === self::NEW_SESSION["S1"] );
    }

    // Проверка на вторичное значение кукисов
    public function testSecondCookie()
    {
        $this->assertTrue( self::mainTestData("getCookie", "C1") === self::NEW_COOKIE["C1"] );
    }

    // Проверка на получение $_GET
    public function testGet()
    {
        $this->assertTrue( self::mainTestData("getGet", "GET1") === self::GET["GET1"] );
    }

    // Проверка на получение валидный $_GET
    public function testValidGet()
    {
        $this->assertTrue( self::mainTestData("getGet", "GET2") === "&lt;script&gt;alert('H');&lt;/script&gt;GET200");
    }

    // Проверка на получение $_POST
    public function testPost()
    {
        $this->assertTrue( self::mainTestData("getPost", "POST1") === self::POST["POST1"] );
    }

    // Проверка на получение валидный $_POST
    public function testValidPost()
    {
        $this->assertTrue( self::mainTestData("getPost", "POST2") === "&lt;script&gt;alert('H');&lt;/script&gt;POST200");
    }

    // Проверка на получение $_REQUEST
    public function testRequest()
    {
        $this->assertTrue( self::mainTestData("getRequest", "REQUEST1") === self::REQUEST["REQUEST1"] );
    }

    // Проверка на получение валидный $_REQUEST
    public function testValidRequest()
    {
        $this->assertTrue( self::mainTestData("getRequest", "REQUEST2") === "&lt;script&gt;alert('H');&lt;/script&gt;REQUEST200");
    }

    // Проверка на получение $_SERVER[<PARAM>]
    public function testServerParam()
    {
        $this->assertTrue( self::mainTestData("getHttpHeader", 'TEST_PARAM') === "server-test-parameter" );
    }

    // Проверка на получение $_SERVER['HTTP_REFERER']
    public function testServerHttpReferer()
    {
        $this->assertTrue( self::mainTestData("getReferer", "") === "https://warning.site/?h=&lt;script&gt;alert('H');&lt;/script&gt;1000" );
    }

    // Проверка на получение $_SERVER['REQUEST_METHOD']
    public function testRequestMethod()
    {
        $this->assertTrue( self::mainTestData("getMethod", "") === "GET" );
    }

    // Проверка на получение $_SERVER['REQUEST_URI']
    public function testGetUri()
    {
        $this->assertTrue( self::mainTestData("getUri", "") === "/index.html" );
    }

    // Проверка на получение полного адреса домена
    public function testGetFullUrl()
    {
        $this->assertTrue( self::mainTestData("getFullUrl", "") === "http://localhost:8080/index.html" );
    }

    // Проверка на получение полного адреса домена
    public function testGetHost()
    {
        $this->assertTrue( self::mainTestData("getHost", "") === "localhost:8080" );
    }

    // Проверка на получение X_REQUESTED_WITH, чтобы отличить ajax-запрос от запроса
    public function testXmlHttpRequest()
    {
        $this->assertTrue( self::mainTestData("isXmlHttpRequest", "") === "" );
    }

    // Проверка на получение массива значений для загруженного файла
    public function testGetFiles()
    {
        $this->assertTrue( self::mainTestData("getFiles", "") === "Array" );
    }

    // Проверка на получение части запроса после имени скрипта
    public function testGetUrlParameter()
    {
        $this->assertTrue( self::mainTestData("getUrlParameter", "") === "/some/test" );
    }

    // Проверка на получение ip-адреса
    public function testGetRemoteAddress()
    {
        $this->assertTrue( self::mainTestData("getRemoteAddress", "") === "127.0.0.1" );
    }

    // Проверка на обратную очистке тегов
    public function testReturnPrivateTags()
    {
        $this->assertTrue( self::mainTestData("returnPrivateTags", "\"&lt;script&gt;1000&lt;/script&gt;\"") === "<script>1000</script>" );
    }

    // Проверка на получение строки
    public function testGetGetString()
    {
        $this->assertTrue( self::mainTestData("getGetString", "GET1") === self::GET["GET1"] );
    }

    // Проверка на получение строкового числа
    public function testGetGetStringOnNumber()
    {
        $this->assertTrue( self::mainTestData("getGetString", "GET4") === strval(self::GET["GET4"]) );
    }

    // Проверка на получение целого числа из числового значения
    public function testGetGetIntToIntegerValue()
    {
        $this->assertTrue( self::mainTestData("getGetInt", "GET3") === strval(self::GET["GET3"]) );
    }

    // Проверка на получение целого числа из нечислового значения
    public function testGetGetIntoNonIntegerValue()
    {
        $this->assertTrue( self::mainTestData("getGetInt", "GET1") === "0" );
    }

    // Проверка на получение целого числа из дробного значения
    public function testGetGetIntoIntegerValue()
    {
        $this->assertTrue( self::mainTestData("getGetInt", "GET4") === strval(intval(self::GET["GET4"])) );
    }

    // Проверка на получение дробного числа из нечислового значения
    public function testGetFloatIntoNonIntegerValue()
    {
        $this->assertTrue( self::mainTestData("getGetFloat", "GET1") === "0" );
    }

    // Проверка на получение отрицательного дробного числа из отрицательного дробного значения
    public function testGetFloatIntoNonFloatedValue()
    {
        $this->assertTrue( self::mainTestData("getGetFloat", "GET5") === strval(self::GET["GET5"]) );
    }

    // Проверка на получение дробного числа из строкового значения
    public function testGetFloatIntoStringValue()
    {
        $this->assertTrue( self::mainTestData("getGetFloat", "GET1") === "0" );
    }

    // Проверка на получение POST-значения
    public function testGetPostIntIntoStringValue()
    {
        $this->assertTrue( self::mainTestData("getPostInt", "POST3") === strval(self::POST["POST3"]) );
    }

    // Проверка на получение POST-значения из отрицательного числа
    public function testGetPostIntIntoIntValue()
    {
        $this->assertTrue( self::mainTestData("getPostInt", "POST5") === strval(intval(self::POST["POST5"])) );
    }

    // Проверка на получение REQUEST-значения
    public function testGetRequestIntIntoStringValue()
    {
        $this->assertTrue( self::mainTestData("getRequestInt", "REQUEST3") === strval(self::REQUEST["REQUEST3"]) );
    }


    private function mainTestData($method, $param)
    {
        $command = "php " . self::FILENAME . " " . $method . " " . $param ;
        $result = exec($command);
        return $result;
    }


}


