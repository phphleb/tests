<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/CacheRoutesTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/DeterminantStaticUncreated.php";
require_once HLEB_FRAMEWORK_DIR . "Main/Errors/ErrorOutput.php";
require_once HLEB_FRAMEWORK_DIR . "Main/Info.php";
require_once HLEB_FRAMEWORK_DIR . "Scheme/Home/Constructor/Routes/StandardRoute.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Routes/MainRoute.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Routes/Route.php";
require_once HL_RESOURCES_DIR . "TestLoadRoutes.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Cache/CacheRoutes.php";

use PHPUnit\Framework\TestCase;
use Hleb\Constructor\Routes\LoadRoutes;
use Hleb\Scheme\Home\Constructor\Routes\StandardRoute;
use Hleb\Main\Errors\ErrorOutput;
use Hleb\Constructor\Cache\CacheRoutes;


class CacheRoutesTest extends TestCase
{
    const TEST_ROUTES = HL_RESOURCES_DIR  . "routes.from_test_protect_method.txt";

    // Загружается ли контент
    public function testLoadContent()
    {
        $value = $this->mainTestGetObj();
        $this->assertFalse(empty($value));
    }

    // Загружается ли правильный контент
    public function testLoadValidContent()
    {
        $value = $this->mainTestGetObj();
        $valid = file_get_contents(self::TEST_ROUTES);
        $this->assertTrue(json_encode($value) == $valid);
    }


    private function mainTestGetObj()
    {
        return (new CacheRoutes)->load();
    }


}