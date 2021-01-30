<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/MainAutoloaderTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";
require_once HLEB_FRAMEWORK_DIR . "Main/Insert/DeterminantStaticUncreated.php";
require_once HLEB_FRAMEWORK_DIR . "Scheme/Home/Main/Connector.php";//
require_once HLEB_GLOBAL_DIRECTORY . "/app/Optional/MainConnector.php";
require_once HLEB_FRAMEWORK_DIR . "/Main/HomeConnector.php";
require_once HLEB_FRAMEWORK_DIR . "Main/MainAutoloader.php";

use PHPUnit\Framework\TestCase;
use Hleb\Main\MainAutoloader;
use \App\Optional\MainConnector;
use \Hleb\Main\HomeConnector;

class MainAutoloaderTest extends TestCase
{
    const INCLUDE_EXEC_FILE = HL_RESOURCES_DIR . 'TestLoadClass.php' ;
    // Проверка загрузки класса из ядра
    public function testLoadClassInVendor()
    {
        $test_class = "Hleb\Main\TryClass";
        $this->mainTestGetAutoloader($test_class);
        $myclass = null;
        if (class_exists($test_class)) {
            $myclass = new $test_class($test_class);
        }
        $this->assertNotNull($myclass);
    }

    // Проверка пропуска поиска для следующего автозагрузчика
    public function testLoadInvalidClass()
    {
        $test_class = "Undefined\Undefined";
        $this->mainTestGetAutoloader($test_class);
        $myclass = null;
        if (class_exists($test_class)) {
            $myclass = new $test_class($test_class);
        }
        $this->assertNull($myclass);
    }

    // Проверка существования тестового класса
    public function testSearchTestClass()
    {
        $this->assertFileExists(self::INCLUDE_EXEC_FILE);
    }


    // Проверка нахождения класса согласно PSR
    public function testLoadPSRClass()
    {
        $test_class = "Phphleb\Tests\Framework\Resources\TestLoadClass";
        $this->mainTestGetAutoloader($test_class);
        $myclass = null;
        if (class_exists($test_class)) {
            $myclass = new $test_class();
        }
        $this->assertNotNull($myclass);
    }

    // Проверка НЕнахождения класса в автозагрузчике Home
    public function testSearchClassNameOnHomeConnector()
    {
        $test_class = "Undefined\Undefined";
        $this->assertFalse($this->mainTestGetAutoloaderSearchHome($test_class));
    }

    // Проверка нахождения класса в автозагрузчике Home
    public function testSearchClassNameOnHomeConnector2()
    {
        $test_class = "Hleb\Constructor\Handlers\Key";
        $this->assertTrue($this->mainTestGetAutoloaderSearchHome($test_class));
    }

    // Проверка HEнахождения класса в автозагрузчике Main
    public function testSearchClassNameOnHomeConnector3()
    {
        $test_class = "Undefined\Undefined";
        $this->assertFalse($this->mainTestGetAutoloaderSearchMain($test_class));
    }
    
    
    

    public function mainTestGetAutoloader($class){

        return (new MainAutoloader())->get($class);

    }

    public function mainTestGetAutoloaderSearchHome($class){

        return (new MainAutoloader())->search_and_include($class, (new HomeConnector));

    }

    public function mainTestGetAutoloaderSearchMain($class){

        return (new MainAutoloader())->search_and_include($class, (new MainConnector));

    }


}