<?php

use App\Controllers\HTest0ConfigController;

Route::get('/test-config/custom/value')
    ->controller(HTest0ConfigController::class, 'getCustomConfig')
    ->name('test.Config.custom');
