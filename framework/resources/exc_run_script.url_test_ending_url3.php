<?php
// Start  phpunit vendor/phphleb/tests/framework/unit/UrlTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";
require_once HLEB_FRAMEWORK_DIR . "Main/Errors/ErrorOutput.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/URL.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Key.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/ProtectedCSRF.php";


if (session_status()!= 1)   session_start();

define("HLEB_PROJECT_ENDING_URL",  $argv[1] == 1 ? true : false );

print \Hleb\Constructor\Handlers\URL::getStandardUrl($argv[2]);