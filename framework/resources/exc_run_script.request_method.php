<?php
// Start  phpunit vendor/phphleb/tests/framework/unit/RequestTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";

function hleb_actual_http_protocol($complete = true) {
    return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http') . ($complete ? '://' : '');
}

require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Request.php";

if (session_status()!= 1)   session_start();

define('START_COOKIE', ["C1" => "100", "C2" => "200"]);
define('NEW_COOKIE', ["C1" => "101", "C2" => "201", "C3" => "301"]);
define('START_SESSION', ["S1" => "1100", "S2" => "1200"]);
define('NEW_SESSION', ["S1" => "1101", "S2" => "1201", "S3" => "1301"]);
define('HLEB_PROJECT_PROTOCOL', 'https://');
define("HLEB_MAIN_DOMAIN", "test.site");
$_COOKIE = START_COOKIE;
$_SESSION = START_SESSION;
$_GET = ["GET1" => "GET100", "GET2" => "<script>alert('H');</script>GET200", "GET3" => 8888, "GET4" => 88.88, "GET5" => -8888];
$_POST = ["POST1" => "POST100", "POST2" => "<script>alert('H');</script>POST200", "POST3"=> 9999, "POST4"=> 99.99, "POST5"=> -9999];
$_REQUEST = ["REQUEST1" => "REQUEST100", "REQUEST2" => "<script>alert('H');</script>REQUEST200", "REQUEST3" => 10001, "REQUEST4" => 1000.1, "REQUEST5" => -10001];

$_SERVER['HTTP_HOST'] = "localhost:8080";
$_SERVER['X_REQUESTED_WITH'] = 'XMLHttpRequest';
$_FILES = "Array";
$_SERVER['PATH_INFO'] = "/some/test";

$_COOKIE = NEW_COOKIE;
$_SESSION = NEW_SESSION;

$_SERVER['HTTP_REFERER'] = "https://warning.site/?h=<script>alert('H');</script>1000";
$_SERVER['TEST_PARAM'] = "server-test-parameter";
$_SERVER['REQUEST_METHOD'] = "GET";
$_SERVER['REQUEST_URI'] = "/index.html";
$_SERVER['REMOTE_ADDR'] = "127.0.0.1";


$method = $argv[1];
$data = $argv[2] ?? null;

print strval(is_null($data) ? \Hleb\Constructor\Handlers\Request::$method() : \Hleb\Constructor\Handlers\Request::$method($data));

