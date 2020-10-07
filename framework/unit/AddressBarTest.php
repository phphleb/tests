<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/AddressBarTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/AddressBar.php";


use PHPUnit\Framework\TestCase;
use Hleb\Constructor\Handlers\AddressBar;

class AddressBarTest extends TestCase
{
    const DEFAULT_DATA = [
        "SERVER" => [
            'REQUEST_URI'=>"/test/",
            'HTTP_HOST'=>'site.ru'
        ],
        "HTTPS" => "https://",
        "HLEB_PROJECT_ONLY_HTTPS" => true,
        "HLEB_PROJECT_ENDING_URL" => true,
        "HLEB_PROJECT_DIRECTORY" => HLEB_PROJECT_DIRECTORY,
        "HLEB_PROJECT_GLUE_WITH_WWW" => 0,
        "HLEB_PROJECT_VALIDITY_URL" => "/^[a-z0-9а-яё\_\-\/\.]+$/u"
    ];
    CONST INCLUDE_EXEC_FILE = HL_RESOURCES_DIR . "exc_run_script.url_test_address_bar.php";
    CONST INCLUDE_EXEC_FILE2 = HL_RESOURCES_DIR . "exc_run_script.url_test_address_bar2.php";

    // Проверка, что работает
    public function testWorkingBar()
    {
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE, self::DEFAULT_DATA );
        $this->assertTrue("https://site.ru/test/" == $value);
    }

    // Проверка, что редиректит с http
    public function testBarParamsHttp1()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["HLEB_PROJECT_ONLY_HTTPS"] = true;
        $origin_data["SERVER"]['HTTPS'] = "http://";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE,  $origin_data);
        $this->assertTrue("https://site.ru/test/" == $value);
    }

    // Проверка, что редиректит с http
    public function testBarParamsHttp2()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["HLEB_PROJECT_ONLY_HTTPS"] = false;
        $origin_data["SERVER"]['HTTPS'] = "http://";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE,  $origin_data);
        $this->assertTrue("https://site.ru/test/" === $value);
    }

    // Проверка, что редиректит с двойными слешами
    public function testBarParams3()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["SERVER"]['REQUEST_URI'] = "//test/////////test///";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE2,  $origin_data);
        $this->assertTrue("https://site.ru/test/test/" == $value);
    }

    // Проверка, что редиректит со слешем в конце
    public function testBarParams4()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["HLEB_PROJECT_ENDING_URL"] = false;
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE2,  $origin_data);
        $this->assertTrue("https://site.ru/test" == $value);
    }

    // Проверка, что редиректит без слеша в конце
    public function testBarParams5()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["HLEB_PROJECT_ENDING_URL"] = true;
        $origin_data["SERVER"]['REQUEST_URI'] = "/test";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE2,  $origin_data);
        $this->assertTrue("https://site.ru/test/" == $value);
    }

    // Если редиректит на главную, когда проверка по HLEB_PROJECT_VALIDITY_URL не удалась
    public function testBarParams6()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["SERVER"]['REQUEST_URI'] = "/test@@@@@/";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE2,  $origin_data);
        $this->assertTrue("https://site.ru" == $value);
    }

    // Проверка, что НЕ редиректит с HLEB_PROJECT_GLUE_WITH_WWW = 0
    public function testBarParams7()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["HLEB_PROJECT_GLUE_WITH_WWW"] = 0;
        $origin_data["SERVER"]['HTTP_HOST'] = "www.site.com";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE,  $origin_data);
        $this->assertTrue('https://www.site.com/test/' == $value);
    }

    // Проверка, что НЕ редиректит с HLEB_PROJECT_GLUE_WITH_WWW = 1
    public function testBarParams8()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["HLEB_PROJECT_GLUE_WITH_WWW"] = 0;
        $origin_data["SERVER"]['HTTP_HOST'] = "www.site.com";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE,  $origin_data);
        $this->assertTrue('https://www.site.com/test/' == $value);
    }

    // Проверка, что НЕ редиректит с HLEB_PROJECT_GLUE_WITH_WWW = 2
    public function testBarParams9()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["HLEB_PROJECT_GLUE_WITH_WWW"] = 0;
        $origin_data["SERVER"]['HTTP_HOST'] = "site.com";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE,  $origin_data);
        $this->assertTrue('https://site.com/test/' == $value);
    }

    // Проверка, что НЕ редиректит с HLEB_PROJECT_GLUE_WITH_WWW = 0
    public function testBarParams10()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["HLEB_PROJECT_GLUE_WITH_WWW"] = 0;
        $origin_data["SERVER"]['HTTP_HOST'] = "site.com";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE,  $origin_data);
        $this->assertTrue('https://site.com/test/' == $value);
    }

    // Проверка, что редиректит с HLEB_PROJECT_GLUE_WITH_WWW = 1
    public function testBarParams11()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["HLEB_PROJECT_GLUE_WITH_WWW"] = 1;
        $origin_data["SERVER"]['HTTP_HOST'] = "www.site.com";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE2,  $origin_data);
        $this->assertTrue('https://site.com/test/' == $value);
    }

    // Проверка, что редиректит с HLEB_PROJECT_GLUE_WITH_WWW = 2
    public function testBarParams12()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["HLEB_PROJECT_GLUE_WITH_WWW"] = 2;
        $origin_data["SERVER"]['HTTP_HOST'] = "site.com";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE2,  $origin_data);
        $this->assertTrue('https://www.site.com/test/' == $value);
    }

    // Проверка, что работает с доменом на кириллице
    public function testDomainKirillic1()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["SERVER"]['HTTP_HOST'] = "xn--80aswg.xn--p1ai";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE,  $origin_data);
        $this->assertTrue("https://сайт.рф/test/" == $value);
    }

    // Проверка, что работает с ЧПУ на кириллице
    public function testDomainKirillic2()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["SERVER"]['HTTP_HOST'] = "xn--80aswg.xn--p1ai";
        $origin_data["SERVER"]['REQUEST_URI'] = "/тест/";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE,  $origin_data);
        $this->assertTrue("https://сайт.рф/тест/" == $value);
    }

    // Проверка, что НЕ работает с ЧПУ на кириллице с ограничением
    public function testDomainKirillic3()
    {
        $origin_data = self::DEFAULT_DATA;
        $origin_data["SERVER"]['HTTP_HOST'] = "xn--80aswg.xn--p1ai";
        $origin_data['HLEB_PROJECT_VALIDITY_URL'] = '/^[a-z\/\.]+$/';
        $origin_data["SERVER"]['REQUEST_URI'] = "/тест/";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE2,  $origin_data);
        $this->assertTrue("https://сайт.рф" == $value);
    }

    // Проверка, что названия GET параметров могут быть числовыми
    public function testNumericGetParams()
    {
        $origin_data = self::DEFAULT_DATA;
        $val = 12345678;
        $origin_data["SERVER"]['REQUEST_URI'] = "/test/?$val";
        $value = $this->mainTestGetData(self::INCLUDE_EXEC_FILE,  $origin_data);
        $this->assertTrue("https://site.ru/test/?$val" == $value);
    }

    private function mainTestGetData(string $filename, array $data)
    {
        $command = "php " . $filename . " " .
            $data["SERVER"]['REQUEST_URI'] . " " .
            $data["SERVER"]['HTTP_HOST'] . " " .
            $data["HTTPS"]  . " " .
            ($data["HLEB_PROJECT_ONLY_HTTPS"] ? 1 : 0) . " " .
            ($data["HLEB_PROJECT_ENDING_URL"] ? 1 : 0) . " " .
            $data["HLEB_PROJECT_DIRECTORY"] . " " .
            $data["HLEB_PROJECT_GLUE_WITH_WWW"] . " " .
            urlencode($data["HLEB_PROJECT_VALIDITY_URL"]) . " ";

        $result = exec($command);
        return $result;
    }


}