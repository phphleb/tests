<?php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/AddressBar.php";

use PHPUnit\Framework\TestCase;
use Hleb\Constructor\Handlers\AddressBar;

$data = [
    "SERVER" => [
        'REQUEST_URI'=>$argv[1],
        'HTTP_HOST'=>$argv[2],
        'REQUEST_METHOD' => $argv[10]
    ],
    "HTTPS" => $argv[3],
    "HLEB_PROJECT_ONLY_HTTPS" => $argv[4] == 1,
    "HLEB_PROJECT_ENDING_URL" => $argv[5] == 1,
    "HLEB_PROJECT_DIRECTORY" => $argv[6],
    "HLEB_PROJECT_GLUE_WITH_WWW" => intval($argv[7]),
    "HLEB_PROJECT_VALIDITY_URL" => urldecode($argv[8]),
    "HLEB_ENDING_URL_INCLUDING_METHODS" => explode(',', $argv[9]),
];

// Проверка редиректа
$address_obj = new \Hleb\Constructor\Handlers\AddressBar($data);
$address_obj->get();
print $address_obj->redirect;

