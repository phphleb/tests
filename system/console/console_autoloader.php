<?php
// Автозагрузчик для раздела с тестированием консольных команд.

if (!function_exists('console_autoloader')) {
    function console_autoloader(string $class)
    {
        $compliance = [
            'Phphleb\Tests\Logger\TestLogger' => __DIR__ . '/../logger/TestLogger.php',
            'Phphleb\Tests\TestLogger' => __DIR__ . '/../resources/TestLogger.php',
            'Hleb\Init\ErrorLog' => __DIR__ . '/../../../framework/Init/ErrorLog.php',
            'Hleb\Main\Insert\BaseAsyncSingleton' => __DIR__ . '/../../../framework/Main/Insert/BaseAsyncSingleton.php',
            'Hleb\Constructor\Cache\RouteMark' => __DIR__ . '/../../../framework/Constructor/Cache/RouteMark.php',
            'Phphleb\Tests\ConsoleInit' => __DIR__ . '/ConsoleInit.php',
            'Phphleb\Tests\TestConsoleErrorException' => __DIR__ . '/TestConsoleErrorException.php',
            'App\Bootstrap\Containers\TaskContainer' => __DIR__ . '/directories/app/Bootstrap/Containers/TaskContainer.php',
            'App\Bootstrap\Containers\TaskContainerInterface' => __DIR__ . '/directories/app/Bootstrap/Containers/TaskContainerInterface.php',
            'App\Commands\Example\Test2c5dn101v10uiTask' => __DIR__ . '/directories/app/Commands/Example/Test2c5dn101v10uiTask.php',

        ];
        if (isset($compliance[$class])) {
            require $compliance[$class];
        }
    }

    spl_autoload_register('console_autoloader', true, true);
}
