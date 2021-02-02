<?php
// Start  phpunit vendor/phphleb/tests/framework/unit/UrlTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";
require_once HLEB_FRAMEWORK_DIR . "Main/Errors/ErrorOutput.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/URL.php";


if (session_status()!= 1)   session_start();

define("HLEB_PROJECT_ENDING_URL",  $argv[1] == 1 ? true : false );

\Hleb\Constructor\Handlers\URL::create(["name1"=>"/1/", "name2"=>"/2", "name3"=>"/2/3/", "name4"=>"/"]);

print \Hleb\Constructor\Handlers\URL::getByName($argv[2]);