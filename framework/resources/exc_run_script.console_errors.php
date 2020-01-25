<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/ConsoleTest.php

$hl_tests_path = explode(DIRECTORY_SEPARATOR, __DIR__);

error_reporting(0);

ob_start();
require_once implode(DIRECTORY_SEPARATOR, array_slice($hl_tests_path, 0,count($hl_tests_path)-5)) . "/console" ;
$errors = error_get_last();
$result = ob_get_contents();
ob_end_clean();

error_reporting(1);

print is_null($errors) ? "OK" : count($errors);

