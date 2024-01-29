<?php
return [
    
    'debug' => false,
    
    'log.enabled' => true,
    
    'max.log.level' => 'info',
    
    'max.cli.log.level' => 'info',
    
    'log.level.in-cli' => true,

    'container.mock.allowed' => false,
    
    'error.reporting' => E_ALL,
    
    'log.sort' => true,

    'log.stream' => false,

    'log.format' => 'row',

    'log.db.excess' => 1,

    'app.cache.on' => false,
    
    'timezone' => 'Europe/Moscow',
    
    'routes.auto-update' => true,
    
    'twig.options' => [
        'debug' => true,
        'charset' => 'utf-8',
        'auto_reload' => true,
        'strict_variables' => false,
        'autoescape' => false,
        'optimizations' => -1,
        'cache' => true,
    ],
    
    'twig.cache.inverted' => [
        // 'resources/views/twig/example',
        // 'modules/test/views/twig/example',
    ],

    'show.request.id' => true,
    'max.log.size' => 0,
    'max.cache.size' => 200,
];