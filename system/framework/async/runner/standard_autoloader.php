<?php
// Автозагрузчик для раздела с асинхронным тестированием фреймворка.

use App\ResetItem;
use App\ResetItemWithConstructor;
use Phphleb\Tests\AsyncLogger\AsyncLoggerTestException;
use Phphleb\Tests\AsyncLogger\TestLogger;
use Phphleb\Tests\RoadRunnerRequestFabric;
use Phphleb\Tests\Psr7PrototypeUriRequest;
use Phphleb\Tests\Psr7PrototypeServerRequest;
use Phphleb\Tests\SwooleInit;
use Phphleb\Tests\RoadRunnerInit;
use Phphleb\Tests\SwooleHttpServerRequest;
use Phphleb\Tests\SwooleRequestFabric;
use Hleb\Main\Logger\LoggerInterface;
use Hleb\HlebAsyncBootstrap;
use Hleb\HlebBootstrap;
use Phphleb\Tests\BaseInitTrait;

if (!function_exists('async_autoloader')) {
    function async_autoloader(string $class)
    {
        $vendorDir = __DIR__ . '/../../../../../../../vendor';
        $compliance = [
            HlebBootstrap::class => $vendorDir . '/phphleb/framework/HlebBootstrap.php',
            HlebAsyncBootstrap::class => $vendorDir . '/phphleb/framework/HlebAsyncBootstrap.php',
            LoggerInterface::class => $vendorDir . '/phphleb/framework/Main/Logger/LoggerInterface.php',
            SwooleRequestFabric::class => __DIR__ . '/SwooleRequestFabric.php',
            ResetItem::class => __DIR__ . '/directories/app/ResetItem.php',
            ResetItemWithConstructor::class => __DIR__ . '/directories/app/ResetItemWithConstructor.php',
            SwooleHttpServerRequest::class => __DIR__ . '/../SwooleHttpServerRequest.php',
            RoadRunnerInit::class => __DIR__ . '/RoadRunnerInit.php',
            SwooleInit::class => __DIR__ . '/SwooleInit.php',
            BaseInitTrait::class => __DIR__ . '/BaseInitTrait.php',
            Psr7PrototypeServerRequest::class => __DIR__ . '/../Psr7PrototypeServerRequest.php',
            Psr7PrototypeUriRequest::class => __DIR__ . '/../Psr7PrototypeUriRequest.php',
            RoadRunnerRequestFabric::class => __DIR__ . '/RoadRunnerRequestFabric.php',
            TestLogger::class => __DIR__ . '/../logger/TestLogger.php',
            AsyncLoggerTestException::class => __DIR__ . '/../logger/AsyncLoggerTestException.php',
        ];
        if (isset($compliance[$class])) {
            require $compliance[$class];
        }
    }

    spl_autoload_register('async_autoloader', true, true);
}
