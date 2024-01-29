<?php

use App\Controllers\HTest0TaskAttributeController as Controller;

Route::get('/test-attribute/controller/disable/off')->controller(Controller::class, 'disableOn');
Route::get('/test-attribute/controller/disable/on')->controller(Controller::class, 'disableOff');
Route::get('/test-attribute/controller/purpose/full')->controller(Controller::class, 'purposeFull');
Route::get('/test-attribute/controller/purpose/external')->controller(Controller::class, 'purposeExternal');
Route::get('/test-attribute/controller/purpose/console')->controller(Controller::class, 'purposeConsole');
