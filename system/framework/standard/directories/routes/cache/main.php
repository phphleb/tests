<?php

Route::get('/test-cache/controller/{method}')
    ->controller(\App\Controllers\HTest0CacheController::class, '<method>');
