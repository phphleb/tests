<?php
define("HL_FRAMEWORK_TESTS_DIR", __DIR__);

$hl_tests_path = explode(DIRECTORY_SEPARATOR, HL_FRAMEWORK_TESTS_DIR);

define("HLEB_GLOBAL_DIRECTORY", implode(DIRECTORY_SEPARATOR, array_slice($hl_tests_path, 0,count($hl_tests_path)-4)));

define('HLEB_VENDOR_DIRECTORY', implode(DIRECTORY_SEPARATOR, array_slice($hl_tests_path, count($hl_tests_path)-4, 1)));

define('HLEB_VENDOR_DIR_NAME', implode(DIRECTORY_SEPARATOR, array_slice($hl_tests_path, count($hl_tests_path)-4, 1)));

define('HLEB_PROJECT_DIRECTORY', HLEB_GLOBAL_DIRECTORY . "/" .HLEB_VENDOR_DIRECTORY . "/phphleb/framework");
define('HLEB_FRAMEWORK_DIR', HLEB_PROJECT_DIRECTORY. "/");

// Optional

define("HL_FRAMEWORK_UNIT_TESTS_DIR", HL_FRAMEWORK_TESTS_DIR . "/unit/");
define("HL_RESOURCES_DIR", HL_FRAMEWORK_TESTS_DIR . "/resources/");

error_reporting(E_ALL);

if (!function_exists('hl_preliminary_exit')) {
    /**
     * @param string $text
     *
     * @internal
     */
    function hl_preliminary_exit($text = '') {
        exit($text);
    }
}

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/DeterminantStaticUncreated.php";

require_once HLEB_FRAMEWORK_DIR . "Scheme/App/Controllers/BaseController.php";

