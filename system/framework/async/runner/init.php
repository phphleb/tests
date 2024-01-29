<?php

use Phphleb\Tests\RoadRunnerRequestFabric;
use Phphleb\Tests\SwooleRequestFabric;

try {

    require __DIR__ . '/standard_autoloader.php';

    define("HLEB_START", microtime(true));

    defined('HLEB_GLOBAL_DIR') or define('HLEB_GLOBAL_DIR', __DIR__ . '/directories');
    defined('HLEB_MODULES_DIR') or define('HLEB_MODULES_DIR', __DIR__ . '/directories/modules');
    defined('HLEB_VENDOR_DIR') or define('HLEB_VENDOR_DIR', __DIR__ . '/../../../../../../../vendor');

    $params = [];
    $data = $argv[1] ?? null;
    $config = $argv[2] ?? [];

    if ($data) {
        $params = json_decode($data, true);
    }
    if ($config) {
        $config = json_decode($config, true);
    }

    $result = [];
    $framework = (new Hleb\HlebAsyncBootstrap(__DIR__ . '/directories/public', $config))
        ->setLogger(new Phphleb\Tests\AsyncLogger\TestLogger());

    $class = '';
    foreach ($params as $serverParams) {
        $class = isset($serverParams['uri']) ? RoadRunnerRequestFabric::class : SwooleRequestFabric::class;
        try {
            $fabric = new $class($serverParams);
            $request = $fabric->create();
            $response = $framework->load($request, $serverParams['session'], $serverParams['cookies'])->getResponse();
            $result[] = [
                'body' => $response->getBody(),
                'headers' => $response->getHeaders(),
                'status' => $response->getStatus(),
                'error' => null,
                'session' => $serverParams['session'] !== null ? $framework->getSession() : null,
            ];
        } catch (Throwable $e) {
            $result['error'] = $e->getMessage() . ' ' . $e->getTraceAsString();
        }
    }
    print json_encode($result, JSON_PRETTY_PRINT);

} catch (\Throwable $t) {
    echo $t->getMessage();
    exit(1);
}

exit(0);