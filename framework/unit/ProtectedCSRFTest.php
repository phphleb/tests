<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/ProtectedCSRFTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";
require_once HLEB_FRAMEWORK_DIR . "Main/Errors/ErrorOutput.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Key.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/ProtectedCSRF.php";

use PHPUnit\Framework\TestCase;
use Hleb\Constructor\Handlers\ProtectedCSRF;

class ProtectedCSRFTest extends TestCase
{   
    CONST INCLUDE_ROUTES_FILE = HL_RESOURCES_DIR . "routes.from_test_protect_method.txt";
    CONST INCLUDE_EXEC_FILE = HL_RESOURCES_DIR . "exc_run_script.protectedCSRF-01.php";

    
    // Создание ключа работает
    public function testReturnData()
    {
        $this->assertFalse(empty($this->mainTestCreateObj()));
    }

    // Проверка защищённого метода через getProtect на правильность
    public function testValidSearchData()
    {
        $this->assertTrue(trim($this->mainTestData(0, "")) == "End test");
    }

    // Проверка защищённого метода через getProtect с отсутствием ключа
    public function testInvalidSearchData()
    {
        $this->assertTrue(trim($this->mainTestData(0, "null")) == "Protected from CSRF");
    }

    // Проверка защищённого метода через getProtect с неправильным ключом
    public function testInvalidKey()
    {
        $this->assertTrue(trim($this->mainTestData(0, "0000000000")) == "Protected from CSRF");
    }

    // Проверка  защищенного метода c принудительным отказом от защиты
    public function testValidSearchData2()
    {
        $this->assertTrue(trim($this->mainTestData(1, "")) == "End test");
    }

    // Проверка  защищенного метода c принудительным отказом от защиты с отсутствием ключа
    public function testInvalidSearchData2()
    {
        $this->assertTrue(trim($this->mainTestData(1, "null")) == "End test");
    }

    // Проверка  защищенного метода c принудительным отказом от защиты с неправильным ключом (ключ должен быть верный всегда)
    public function testInvalidKey2()
    {
        $this->assertTrue(trim($this->mainTestData(1, "0000000000")) == "End test");
    }

    // Проверка  защищённого метода
    public function testValidSearchData3()
    {
        $this->assertTrue(trim($this->mainTestData(2, "")) == "End test");
    }

    // Проверка  защищённого метода с отсутствием ключа
    public function testInvalidSearchData3()
    {
        $this->assertTrue(trim($this->mainTestData(2, "null")) == "Protected from CSRF");
    }

    // Проверка  защищённого метода с неправильным ключом
    public function testInvalidKey3()
    {
        $this->assertTrue(trim($this->mainTestData(2, "0000000000")) == "Protected from CSRF");
    }

    // Проверка  НЕзащищённого метода
    public function testValidSearchData4()
    {
        $this->assertTrue(trim($this->mainTestData(3, "")) == "End test");
    }

    // Проверка  НЕзащищённого метода с отсутствием ключа
    public function testInvalidSearchData4()
    {
        $this->assertTrue(trim($this->mainTestData(3, "null")) == "End test");
    }

    // Проверка  НЕзащищённого метода с неправильным ключом
    public function testInvalidKey4()
    {
        $this->assertTrue(trim($this->mainTestData(3, "0000000000")) == "End test");
    }

    // В правильном ли формате ключ
    public function testCreateValidKey()
    {
        $data =  preg_match('/[^a-z0-9]/', $this->mainTestCreateObj(), $matches);

        $this->assertTrue(count($matches) == 0);
    }


    public function mainTestGetRoutes()
    {
        return file_get_contents(self::INCLUDE_ROUTES_FILE, true);
    }

    private function mainTestData($num, $token)
    {
        $command = "php " . self::INCLUDE_EXEC_FILE . " HTTP " .  " " . $num . " " . self::INCLUDE_ROUTES_FILE . " " . $token;
        $result = exec($command);
        return $result;
    }


    private function mainTestCreateObj()
    {
       return ProtectedCSRF::key();
    }


}

