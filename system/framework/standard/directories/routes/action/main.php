<?php

use App\Controllers\HTest0BeforeActionController;

Route::get('/test-before-action/controller')
    ->controller(HTest0BeforeActionController::class, 'beforeAction');

Route::get('/test-controller-method-name/controller')
    ->controller(HTest0BeforeActionController::class, 'methodNameSuccess');

Route::get('/test-controller-method-name/controller/container')
    ->controller(HTest0BeforeActionController::class, 'methodNameFromContainerSuccess');
