<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/TCreatorTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Constructor/TCreator.php";

use PHPUnit\Framework\TestCase;

class TCreatorTest extends TestCase
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
    // Работает ли правильно вывод значений
    public function testReturn()
    {
        $this->assertTrue($this->mainTestCreateImaginaryContent("Test") === "Test");
    }
    // Есть ли добавление времени
    public function testCacheTime()
    {
        $this->assertEquals( 60, $this->mainTestCacheTime());
    }
    // Получается ли правильно выводить переменные
    public function testData()
    {
        $this->assertEquals(1,$this->mainTestData());
    }

    private function mainTestData()
    {
        ob_start();
        $this->mainTestGetObj(self::INCLUDE_FILE, ["param" => 1])->include();
        $out = ob_get_contents();
        ob_end_clean();
        return $out;
    }

    private function mainTestCacheTime()
    {
        $obj = $this->mainTestGetObj(self::INCLUDE_FILE);
        $obj->setCacheTime(60);
        return $obj->include();
    }

    private function mainTestCreateImaginaryContent($content, $data = [])
    {
        ob_start();
        $this->mainTestGetObj($content, $data)->print();
        $out = ob_get_contents();
        ob_end_clean();
        return $out;
    }

    private function mainTestGetObj($content, $data = [])
    {
        return (new Hleb\Constructor\TCreator($content, $data));
    }


}