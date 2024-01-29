<?php
/*
 * Конфигурация для тестов.
 */
return [
    'debug' => false,
    'max.cli.log.level' => 'info',
    'timezone' => 'Europe/Moscow',
    'test' => 'test_value',  // Неизменяемое значение для тестов.
    'log.enabled' => false,
    'max.log.level' => 'info',
    'log.level.in-cli' => false,
    'error.reporting' => E_ALL,
    'log.sort' => false,
    'log.stream' => false,
    'log.format' => 'row',
    'log.db.excess' => 0,
    'app.cache.on' => false,
    'routes.auto-update' => true,
    'container.mock.allowed' => true,
    'twig.options' => [],
    'twig.cache.inverted' => [],
    'show.request.id' => true,
    'max.log.size' => 0,
    'max.cache.size' => 200,
];