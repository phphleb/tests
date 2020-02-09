<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/ConsoleTest.php

require_once __DIR__ . "/../conf.php";

use PHPUnit\Framework\TestCase;

class ConsoleTest extends TestCase
{
    const FILENAME = HL_FRAMEWORK_TESTS_DIR . "/resources/exc_run_script.console_errors.php";

    // Проверка, не возникают ли ошибки при запросах:


    public function testHelp()
    {
        $this->assertTrue(self::mainTestData("-h") === "OK");
    }

    public function testHelp2()
    {
        $this->assertTrue(self::mainTestData("--help") === "OK");
    }

    public function testInfo()
    {
        $this->assertTrue(self::mainTestData("-i") === "OK");
    }

    public function testInfo2()
    {
        $this->assertTrue(self::mainTestData("-info") === "OK");
    }

    public function testVersion()
    {
        if(!file_exists(HLEB_GLOBAL_DIRECTORY . DIRECTORY_SEPARATOR . HLEB_PUBLIC_DIR)){
           error_log("\n" . "*** If the project’s public directory has changed, specify the path to /console in HLEB_PUBLIC_DIR" . "\n");
        }
        $this->assertTrue(self::mainTestData("-v") === "OK");
    }

    public function testVersion2()
    {
        if(!file_exists(HLEB_GLOBAL_DIRECTORY . DIRECTORY_SEPARATOR . HLEB_PUBLIC_DIR)){
            error_log("\n" . "*** If the project’s public directory has changed, specify the path to /console in HLEB_PUBLIC_DIR" . "\n");
        }
        $this->assertTrue(self::mainTestData("--version") === "OK");
    }

    public function testRoutes()
    {
        $this->assertTrue(self::mainTestData("-r") === "OK");
    }

    public function testRoutes2()
    {
        $this->assertTrue(self::mainTestData("--routes") === "OK");
    }

    public function testList()
    {
        $this->assertTrue(self::mainTestData("-l") === "OK");
    }

    public function testList2()
    {
        $this->assertTrue(self::mainTestData("-list") === "OK");
    }

    private function mainTestData($type, $argument = null)
    {
        $command = "php " . self::FILENAME . " " . $type . " " . $argument;
        $result = exec($command);
        return $result;
    }


}


