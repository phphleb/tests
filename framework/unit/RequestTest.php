<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/RequestTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/DeterminantStaticUncreated.php";
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
    const GET = ["GET1"=>"GET100", "GET2"=>"<script>alert('H');</script>GET200"];
    const POST = ["POST1"=>"POST100", "POST2"=>"<script>alert('H');</script>POST200"];
    const REQUEST = ["REQUEST1" => "REQUEST100", "REQUEST2" => "<script>alert('H');</script>REQUEST200"];


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

    // Проверка, закрывается ли для изменений
    public function testCloseData()
    {
        Request::close();
        Request::add(self::TEST_NAME3, self::TEST_VALUE3);
        $this->assertNull(Request::get(self::TEST_NAME3));
    }

    // Проверка на первоначальное значение сессии
    public function testStartSesion()
    {
        $this->assertTrue( self::mainTestData("getInitialSession", "S1") === self::START_SESSION["S1"] );
    }

    // Проверка на вторичное значение сессии
    public function testSecondSesion()
    {
        $this->assertTrue( self::mainTestData("getSession", "S1") === self::NEW_SESSION["S1"] );
    }

    // Проверка на первоначальное значение кукисов
    public function testStartCookie()
    {
        $this->assertTrue( self::mainTestData("getInitialCookie", "C1") === self::START_COOKIE["C1"] );
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
        $this->assertTrue( self::mainTestData("getFullUrl", "") === "https://test.site" );
    }

    // Проверка на получение полного адреса домена
    public function testGetHost()
    {
        $this->assertTrue( self::mainTestData("getHost", "") === "localhost:8080" );
    }

    // Проверка на получение X_REQUESTED_WITH, чтобы отличить ajax-запрос от запроса
    public function testXmlHttpRequest()
    {
        $this->assertTrue( self::mainTestData("isXmlHttpRequest", "") === "1" );
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

    private function mainTestData($method, $param)
    {
        $command = "php " . self::FILENAME . " " . $method . " " . $param ;
        $result = exec($command);
        //var_dump($result);
        return $result;
    }


}


