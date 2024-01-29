<?php

return [
    'project.paths' => [
        'logs' => '/storage/logs',
        // ,,, //
    ],
    'classes.autoload' => true,

    'origin.request' => false,

    'ending.slash.url' => 0,

    'ending.url.methods' => ['get'],

    'url.validation' => false,

    'session.name' => 'PHPSESSID2',

    'max.session.lifetime' => 0,

    'allowed.route.paths' => [
        // '/routes/map.php',
        // '/routes/demo-updater-option/main.php',
        // ... //
    ],

    'allowed.structure.parts' => [
        // 'adminpan',
        // 'hlogin',
        // ... //
    ],

    'page.external.access' => true,

    'module.dir.name' => 'products',
    'custom.setting.files' => [],
    'custom.function.files' => [],
];
