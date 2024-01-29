<?php

use Products\Open\Controllers\HlTestViewModuleController;
use Products\Test\Controllers\HlTestConfigModuleController;
use Products\Test\Controllers\HlTestDatabaseModuleController;
use Products\Test\Controllers\HlTestInsertTemplateModuleController;
use Products\Test\Controllers\HlTestMiddlewareModuleController;
use Products\Test\Controllers\HlTestTemplateModuleController;
use Products\Test\Middlewares\HlTestMiddleware;

Route::get('/test-module')
    ->module('test', HlTestTemplateModuleController::class);

Route::get('/test-config')
    ->module('test', HlTestConfigModuleController::class);

Route::get('/test-module-middleware')
    ->module('test', HlTestMiddlewareModuleController::class)
    ->middleware(HlTestMiddleware::class);

Route::get('/test-database')
    ->module('test', HlTestDatabaseModuleController::class);

Route::get('/test-template')
    ->module('test', HlTestInsertTemplateModuleController::class);

Route::get('/test-views')
    ->module('open', HlTestViewModuleController::class);