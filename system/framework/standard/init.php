<?php

use Hleb\Main\Logger\LoggerInterface;
use Hleb\HlebBootstrap;

try {

    define("HLEB_START", microtime(true));

    defined('HLEB_GLOBAL_DIR') or define('HLEB_GLOBAL_DIR', __DIR__ . '/directories');
    defined('HLEB_MODULES_DIR') or define('HLEB_MODULES_DIR', __DIR__ . '/directories/modules');
    defined('HLEB_VENDOR_DIR') or define('HLEB_VENDOR_DIR', __DIR__ . '/../../../../../../vendor');

    $params = [];
    $data = $argv[1] ?? null;
    $config = $argv[2] ?? [];


    if ($data) {
        $params = json_decode($data, true);
        foreach ($params['SERVER'] ?? [] as $key => $value) {
            $_SERVER[$key] = $value;
        }
        foreach ($params['POST'] ?? [] as $key => $value) {
            $_POST[$key] = $value;
        }
        foreach ($params['GET'] ?? [] as $key => $value) {
            $_GET[$key] = $value;
        }
        foreach ($params['COOKIE'] ?? [] as $key => $value) {
            $_COOKIE[$key] = $value;
        }
        if (isset($params['SESSION']['PHP-SESSION-ID-TEST'])) {
            session_name('PHP-SESSION-ID-TEST');
            session_id($params['SESSION']['PHP-SESSION-ID-TEST']);
        }
        session_start();
        foreach ($params['SESSION'] ?? [] as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
    if ($config) {
        $config = json_decode($config, true);
    }

    if (!class_exists(HlebBootstrap::class)) {
        require HLEB_VENDOR_DIR . '/phphleb/framework/HlebBootstrap.php';
    }
    if (!class_exists(LoggerInterface::class)) {
        require HLEB_VENDOR_DIR . '/phphleb/framework/Main/Logger/LoggerInterface.php';
    }
    if (!class_exists('Phphleb\Tests\Logger')) {
        require __DIR__ . '/../../logger/TestLogger.php';
    }

    (new HlebBootstrap(__DIR__ . '/directories/public', $config))
        ->setLogger(new Phphleb\Tests\Logger\TestLogger())
        ->load();

} catch (\Throwable $t) {
    echo $t->getMessage();
    exit(1);
}

exit(0);