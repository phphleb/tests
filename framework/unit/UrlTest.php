<?php

    // Start  phpunit vendor/phphleb/tests/framework/unit/UrlTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";
require_once HLEB_FRAMEWORK_DIR . "Main/Errors/ErrorOutput.php";
if(file_exists(HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Url.php")) {
    require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Url.php";
} else {
    require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/URL.php";
}
//require_once HLEB_FRAMEWORK_DIR . "Main/Functions.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Key.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/ProtectedCSRF.php";

// При запуске теста может сгенерироваться ключ кэша, без особых последствий.

use PHPUnit\Framework\TestCase;
use Hleb\Constructor\Handlers\Url;
use Hleb\Main\Functions;
use Hleb\Constructor\Handlers\ProtectedCSRF;

class UrlTest extends TestCase
{
    CONST INCLUDE_EXEC_FILE = HL_RESOURCES_DIR . "exc_run_script.url_test_ending_url.php";
    CONST INCLUDE_EXEC_FILE2 = HL_RESOURCES_DIR . "exc_run_script.url_test_ending_url2.php";
    CONST INCLUDE_EXEC_FILE3 = HL_RESOURCES_DIR . "exc_run_script.url_test_ending_url3.php";
    CONST INCLUDE_EXEC_FILE4 = HL_RESOURCES_DIR . "exc_run_script.url_test_domain.php";
    
    private $session;


    // Проверка getAll
    public function testObjectHasAttributeCreate()
    {
        $this->mainTestCreateData(["0000000000"]);

        $this->assertEquals(["0000000000"], URL::getAll());
    }

    // Проверка add
    public function testAssertAddData()
    {
        $this->mainTestCreateData(["0"]);

        URL::add(["1"]);

        $this->assertEquals(["0","1"], URL::getAll());
    }

    // Проверка getByName получение роута по имени, HLEB_PROJECT_ENDING_URL=false
    public function testGetByName()
    {
        // ["name1"=>"/1/", "name2"=>"/2", "name3"=>"/2/3/", "name4"=>"/"];

        $this->assertEquals("/2",  $this->mainTestData(false, "name2", self::INCLUDE_EXEC_FILE));
    }

    // Проверка getByName - HLEB_PROJECT_ENDING_URL=false
    public function testGetByNameEndingUrlIsFalse()
    {
        // $test_array = ["name1"=>"/1/", "name2"=>"/2", "name3"=>"/2/3/", "name4"=>"/"];

        $this->assertEquals("/1", $this->mainTestData(false, "name1", self::INCLUDE_EXEC_FILE));
    }

    // Проверка getByName - HLEB_PROJECT_ENDING_URL=false
    public function testGetByNameEndingUrlIsFalse2()
    {
        // $test_array = ["name1"=>"/1/", "name2"=>"/2", "name3"=>"/2/3/", "name4"=>"/"];

        $this->assertEquals("/2", $this->mainTestData(false, "name2", self::INCLUDE_EXEC_FILE));
    }

    // Проверка getByName - HLEB_PROJECT_ENDING_URL=false
    public function testGetByNameEndingUrlIsFalse3()
    {
        // ["name1"=>"/1/", "name2"=>"/2", "name3"=>"/2/3/", "name4"=>"/"];

        $this->assertEquals("/2/3", $this->mainTestData(false, "name3", self::INCLUDE_EXEC_FILE));
    }

    // Проверка getByName - HLEB_PROJECT_ENDING_URL=false
    public function testGetByNameEndingUrlIsFalse4()
    {
        // ["name1"=>"/1/", "name2"=>"/2", "name3"=>"/2/3/", "name4"=>"/"];

        $this->assertEquals("", $this->mainTestData(false, "name4", self::INCLUDE_EXEC_FILE));
    }

    // Проверка getByName - HLEB_PROJECT_ENDING_URL=true
    public function testGetByNameEndingUrlIsTrue()
    {
        // $test_array = ["name1"=>"/1/", "name2"=>"/2", "name3"=>"/2/3/", "name4"=>"/"];

        $this->assertEquals("/1/", $this->mainTestData(true, "name1", self::INCLUDE_EXEC_FILE));
    }

    // Проверка getByName - HLEB_PROJECT_ENDING_URL=true
    public function testGetByNameEndingUrlIsTrue2()
    {
        // $test_array = ["name1"=>"/1/", "name2"=>"/2", "name3"=>"/2/3/", "name4"=>"/"];

        $this->assertEquals("/2/", $this->mainTestData(true, "name2", self::INCLUDE_EXEC_FILE));
    }

    // Проверка getByName - HLEB_PROJECT_ENDING_URL=true
    public function testGetByNameEndingUrlIsTrue3()
    {
        // ["name1"=>"/1/", "name2"=>"/2", "name3"=>"/2/3/", "name4"=>"/"];

        $this->assertEquals("/2/3/", $this->mainTestData(true, "name3", self::INCLUDE_EXEC_FILE));
    }

    // Проверка getByName - HLEB_PROJECT_ENDING_URL=true
    public function testGetByNameEndingUrlIsTrue4()
    {
        // ["name1"=>"/1/", "name2"=>"/2", "name3"=>"/2/3/", "name4"=>"/"];

        $this->assertEquals("/", $this->mainTestData(true, "name4", self::INCLUDE_EXEC_FILE));
    }

    // Проверка getMainUrl
    public function testGetMainUrl()
    {
        $reguest_uri = "/page1/page2/page3/?q=params";
        $_SERVER["REQUEST_URI"] = $reguest_uri;
        $this->assertEquals(Url::getMainUrl(), $reguest_uri);
    }

    // Проверка getMainClearUrl
    public function testGetMainClearUrl()
    {
        $reguest_uri = "/page1/page2/page3/?q=params";
        $clear_uri = "/page1/page2/page3/";
        $_SERVER["REQUEST_URI"] = $reguest_uri;
        $this->assertEquals(Url::getMainClearUrl(), $clear_uri );
    }

    // Проверка getProtectUrl c HLEB_PROJECT_ENDING_URL=false
    public function testGetProtectUrl()
    {
        $reguest_uri = "/page1/page2/page3";
        $this->assertEquals($this->mainTestData(0, $reguest_uri, self::INCLUDE_EXEC_FILE2), $reguest_uri . "?_token=" . ProtectedCSRF::key());
    }

    // Проверка getProtectUrl c HLEB_PROJECT_ENDING_URL=false
    public function testGetProtectUrlEndingSlash()
    {
        $reguest_uri = "/page1/page2/page3/";
        $this->assertEquals($this->mainTestData(0, $reguest_uri, self::INCLUDE_EXEC_FILE2), "/page1/page2/page3?_token=" . ProtectedCSRF::key());
    }

    // Проверка getProtectUrl c HLEB_PROJECT_ENDING_URL=false на подстановку в параметры
    public function testGetProtectUrl2()
    {
        $reguest_uri = "/page1/page2/page3?q=params";
        $this->assertEquals($this->mainTestData(0, $reguest_uri, self::INCLUDE_EXEC_FILE2), $reguest_uri . "&_token=" . ProtectedCSRF::key());
    }

    // Проверка getProtectUrl c HLEB_PROJECT_ENDING_URL=false на подстановку в параметры со слешем
    public function testGetProtectUrl2AddSlesh()
    {
        $reguest_uri = "/page1/page2/page3/?q=params";
        $this->assertEquals($this->mainTestData(0, $reguest_uri, self::INCLUDE_EXEC_FILE2),  "/page1/page2/page3?q=params&_token=" . ProtectedCSRF::key());
    }

    // Проверка getProtectUrl c HLEB_PROJECT_ENDING_URL=true
    public function testGetProtectUrlEndingTrue()
    {
        $reguest_uri = "/page1/page2/page3";
        $this->assertEquals($this->mainTestData(1, $reguest_uri, self::INCLUDE_EXEC_FILE2), $reguest_uri . "/?_token=" . ProtectedCSRF::key());
    }

    // Проверка getProtectUrl c HLEB_PROJECT_ENDING_URL=true
    public function testGetProtectUrlEndingTruEndingSlash()
    {
        $reguest_uri = "/page1/page2/page3/";
        $this->assertEquals($this->mainTestData(1, $reguest_uri, self::INCLUDE_EXEC_FILE2), $reguest_uri . "?_token=" . ProtectedCSRF::key());
    }

    // Проверка getProtectUrl c HLEB_PROJECT_ENDING_URL=true на подстановку в параметры
    public function testGetProtectUrl2EndingTrue()
    {
        $reguest_uri = "/page1/page2/page3?q=params";
        $this->assertEquals($this->mainTestData(1, $reguest_uri, self::INCLUDE_EXEC_FILE2),  "/page1/page2/page3/?q=params&_token=" . ProtectedCSRF::key());
    }

    // Проверка getProtectUrl c HLEB_PROJECT_ENDING_URL=true на подстановку в параметры со слешем
    public function testGetProtectUrl2EndingTrue2()
    {
        $reguest_uri = "/page1/page2/page3/?q=params";
        $this->assertEquals($this->mainTestData(1, $reguest_uri, self::INCLUDE_EXEC_FILE2),  "/page1/page2/page3/?q=params&_token=" . ProtectedCSRF::key());
    }

    // Проверка getStandardUrl c HLEB_PROJECT_ENDING_URL=false
    public function testGetStandardUrl()
    {
        $reguest_uri = "/page1/page2/page3";
        $this->assertEquals($this->mainTestData(0, $reguest_uri, self::INCLUDE_EXEC_FILE3), "/page1/page2/page3");
    }

    // Проверка getStandardUrl c HLEB_PROJECT_ENDING_URL=true
    public function testGetStandardUrl2()
    {
        $reguest_uri = "/page1/page2/page3";
        $this->assertEquals($this->mainTestData(1, $reguest_uri, self::INCLUDE_EXEC_FILE3), "/page1/page2/page3/");
    }

    // Проверка getStandardUrl c HLEB_PROJECT_ENDING_URL=true
    public function testGetStandardUrl3()
    {
        $reguest_uri = "/page1/page2/page3/";
        $this->assertEquals($this->mainTestData(1, $reguest_uri, self::INCLUDE_EXEC_FILE3), "/page1/page2/page3/");
    }

    // Проверка getStandardUrl c HLEB_PROJECT_ENDING_URL=false
    public function testGetStandardUrl4()
    {
        $reguest_uri = "/page1/page2/page3/";
        $this->assertEquals($this->mainTestData(0, $reguest_uri, self::INCLUDE_EXEC_FILE3), "/page1/page2/page3");
    }

    // Проверка getFullUr
    public function testGetFullUrl()
    {
        $reguest_uri = "/page1/page2/page3";
        $this->assertEquals($this->mainTestDataFullUrl(self::INCLUDE_EXEC_FILE4, 0, "https://", "site.com",   $reguest_uri), 'https://site.com/page1/page2/page3');
    }

    // Проверка getFullUr  со слешем
    public function testGetFullUrl2()
    {
        $reguest_uri = "/page1/page2/page3/";
        $this->assertEquals($this->mainTestDataFullUrl(self::INCLUDE_EXEC_FILE4, 0, "https://", "site.com",   $reguest_uri), 'https://site.com/page1/page2/page3');
    }

    // Проверка getFullUr  HLEB_PROJECT_ENDING_URL=true
    public function testGetFullUrl3()
    {
        $reguest_uri = "/page1/page2/page3";
        $this->assertEquals($this->mainTestDataFullUrl(self::INCLUDE_EXEC_FILE4, 1, "https://", "site.com",   $reguest_uri), 'https://site.com/page1/page2/page3/');
    }

    // Проверка getFullUr  HLEB_PROJECT_ENDING_URL=true со слешем
    public function testGetFullUrl4()
    {
        $reguest_uri = "/page1/page2/page3/";
        $this->assertEquals($this->mainTestDataFullUrl(self::INCLUDE_EXEC_FILE4, 1, "https://", "site.com",   $reguest_uri), 'https://site.com/page1/page2/page3/');
    }

    // Проверка getFullUr
    public function testGetFullUrlHTTP()
    {
        $reguest_uri = "/page1/page2/page3";
        $this->assertEquals($this->mainTestDataFullUrl(self::INCLUDE_EXEC_FILE4, 0, "http://", "site.com",   $reguest_uri), 'http://site.com/page1/page2/page3');
    }

    // Проверка getFullUr HTTP со слешем
    public function testGetFullUrl2HTTP()
    {
        $reguest_uri = "/page1/page2/page3/";
        $this->assertEquals($this->mainTestDataFullUrl(self::INCLUDE_EXEC_FILE4, 0, "http://", "site.com",   $reguest_uri), 'http://site.com/page1/page2/page3');
    }

    // Проверка getFullUr HTTP HLEB_PROJECT_ENDING_URL=true
    public function testGetFullUrl3HTTP()
    {
        $reguest_uri = "/page1/page2/page3";
        $this->assertEquals($this->mainTestDataFullUrl(self::INCLUDE_EXEC_FILE4, 1, "http://", "site.com",   $reguest_uri), 'http://site.com/page1/page2/page3/');
    }

    // Проверка getFullUr HTTP HLEB_PROJECT_ENDING_URL=true со слешем
    public function testGetFullUrl4HTTP()
    {
        $reguest_uri = "/page1/page2/page3/";
        $this->assertEquals($this->mainTestDataFullUrl(self::INCLUDE_EXEC_FILE4, 1, "http://", "site.com",   $reguest_uri), 'http://site.com/page1/page2/page3/');
    }

    // Работают ли параметры в url
    public function testGetFullUrlParams()
    {
        $reguest_uri = "/page1/page2/page3?q=param";
        $this->assertEquals($this->mainTestDataFullUrl(self::INCLUDE_EXEC_FILE4, 1, "https://", "site.com",   $reguest_uri), 'https://site.com/page1/page2/page3/?q=param');
    }




    private function mainTestCreateData($data)
    {
        return (Url::create($data));
    }

    private function mainTestData($ending_url, $name, $filename)
    {
        $command = "php " . $filename . " " . ($ending_url ? 1 : 0) . " " . $name ;
        $result = exec($command);
        return $result;
    }

    private function mainTestDataFullUrl($filename, $ending_url, $protocol, $domain, $param )
    {
        $command = "php " . $filename . " " . ($ending_url ? 1 : 0) . " " . $protocol . " " . $domain . " " .  " " . $param;
        $result = exec($command);
        return $result;
    }



}