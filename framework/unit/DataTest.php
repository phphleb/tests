<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/DataTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Routes/Data.php";

if(function_exists("hleb_to0me1cd6vo7gd_data")){ function hleb_to0me1cd6vo7gd_data(){ return ["param" => "100"]; };}

use PHPUnit\Framework\TestCase;
use Hleb\Constructor\Routes\Data;

class DataTest extends TestCase
{
    CONST TEST_ARRAY = ["test" => 100500];

    
    // Добавление данных работает
    public function testReturnData()
    {
        $this->assertTrue($this->mainTestCreateObject() === "");
    }

    // Совпадают ли данные
    public function testAssertData()
    {
        $this->assertTrue($this->mainTestReturnData() === self::TEST_ARRAY);
    }

    // Совпадают ли данные после переназначения
    public function testAssertValidData()
    {
        $this->mainTestAddInvalidData();
        $this->assertTrue($this->mainTestReturnData() === self::TEST_ARRAY);
    }

    private function mainTestCreateObject()
    {
        ob_start();
        $this->mainTestCreateObj();
        $out = ob_get_contents();
        ob_end_clean();
        return $out;
    }

    private function mainTestCreateObj()
    {
        Data::create_data(self::TEST_ARRAY);
    }

    private function mainTestAddInvalidData()
    {
        Data::create_data(["test2" => 30000]);
    }

    private function mainTestReturnData()
    {
        return Data::return_data();
    }


}