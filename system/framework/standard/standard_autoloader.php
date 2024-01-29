<?php
// Автозагрузчик для раздела с тестированием фреймворка.

if (!function_exists('standard_autoloader')) {
    function standard_autoloader(string $class)
    {
        $compliance = [
            'Phphleb\Tests\StandardInit' => __DIR__ . '/StandardInit.php',
            'Phphleb\Tests\HeaderInit' => __DIR__ . '/HeaderInit.php',
        ];
        if (isset($compliance[$class])) {
            require $compliance[$class];
        }
    }

    spl_autoload_register('standard_autoloader', true, true);
}
