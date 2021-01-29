<?php
require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";
require_once HLEB_FRAMEWORK_DIR . "Main/Errors/ErrorOutput.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Key.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/ProtectedCSRF.php";

error_reporting(0);

if (session_status()!= 1)   session_start();

$_SERVER["SERVER_PROTOCOL"] = $argv[1];
$num_data = $argv[2];
$resource = $argv[3];
$token = $argv[4] ?? null;

if(empty($token)){
    $_REQUEST['_token'] = Hleb\Constructor\Handlers\ProtectedCSRF::key();
} else if($token != "null"){
    $_REQUEST['_token'] = $token;
}
$data_file = file_get_contents($resource);
Hleb\Constructor\Handlers\ProtectedCSRF::testPage(json_decode($data_file, true)[$num_data]);

print "End test";

