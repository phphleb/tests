<?php

use App\Controllers\HTest0ContainerController;

Route::get('/test-container/controller/{type}/{num}')
    ->controller(HTest0ContainerController::class, 'action<type><num>')
    ->name('test.Container');
