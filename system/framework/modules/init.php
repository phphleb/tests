<?php

use Hleb\Main\Logger\LoggerInterface;
use Hleb\HlebBootstrap;

try {

    define("HLEB_START", microtime(true));

    defined('HLEB_GLOBAL_DIR') or define('HLEB_GLOBAL_DIR', __DIR__ . '/directories');
    defined('HLEB_VENDOR_DIR') or define('HLEB_VENDOR_DIR', __DIR__ . '/../../../../../../vendor');

    $params = [];
    $data = $argv[1] ?? null;

    if ($data) {
        $params = json_decode($data, true);
        foreach ($params['SERVER'] ?? [] as $key => $value) {
            $_SERVER[$key] = $value;
        }
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

    (new HlebBootstrap(__DIR__ . '/directories/public'))
        ->setLogger(new Phphleb\Tests\Logger\TestLogger())
        ->load();

} catch (\Throwable $t) {
    echo $t->getMessage();
    exit(1);
}

exit(0);