<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/VCreatorTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Constructor/VCreator.php";

/** @internal */
function hleb_data(){ return ["param" => "100"]; };

use PHPUnit\Framework\TestCase;

class VCreatorTest extends TestCase
{
    CONST INCLUDE_FILE = HL_RESOURCES_DIR . "data_in_params01.php";

    // Есть ли файл - заглушка
    public function testResource()
    {
        $this->assertFileExists(self::INCLUDE_FILE);
    }
    // Правильный ли контент у файла - заглушки
    public function testResourceContent()
    {
        $this->assertEquals(file_get_contents(self::INCLUDE_FILE, true), '<?php if(isset($param) && $param === $this->param) print $param;' );
    }

    // Работает ли (вывод параметров)
    public function testParamsReturn()
    {
        $this->assertTrue($this->mainTestData() === "100");
    }

    private function mainTestData()
    {
        ob_start();
        $this->mainTestGetObj(self::INCLUDE_FILE)->view();
        $out = ob_get_contents();
        ob_end_clean();
        return $out;
    }

    private function mainTestGetObj($include)
    {
        return (new Hleb\Constructor\VCreator($include));
    }


}