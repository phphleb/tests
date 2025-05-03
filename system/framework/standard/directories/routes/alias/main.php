<?php

use App\Controllers\HTest0AliasRouteController;
use App\Middlewares\HlTestAliasMiddleware;

Route::get('alias-origin-1', 'TEST-ALIAS-1')->name('test.alias.origin.1');

Route::alias('alias-2', 'test.alias.2', 'test.alias.origin.1');

Route::match(['get', 'post'], 'alias-origin-2/{id}')
    ->controller(HTest0AliasRouteController::class, 'action<id>')
    ->middleware(HlTestAliasMiddleware::class)
    ->name('test.alias.origin.2');

Route::toGroup()->middleware(HlTestAliasMiddleware::class)->prefix('prefix');
    Route::alias('alias-3/{id}', 'test.alias.3', 'test.alias.origin.2');
Route::endGroup();
