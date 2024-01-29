<?php

use App\Controllers\Event\HTestEventController;
use App\Middlewares\Event\EventMiddleware;
use Modules\ExampleTest\Controllers\Event\EventModuleController;

Route::get('/test-event/controller/index')
    ->controller(HTestEventController::class, 'index')
    ->name('test.EventContainer');

Route::get('/test-event/controller/event/args/1')
    ->controller(HTestEventController::class, 'testEventArgs1')
    ->name('test.EventControllerArgs1');

Route::get('/test-event/controller/event/args/2')
    ->controller(HTestEventController::class, 'testEventArgs2')
    ->name('test.EventControllerArgs2');

Route::get('/test-event/controller/middleware')
    ->controller(HTestEventController::class, 'index')
    ->before(EventMiddleware::class, 'index')
    ->name('test.EventMiddleware');

Route::get('/test-event/controller/middleware/2')
    ->controller(HTestEventController::class, 'testEventAfter3')
    ->before(EventMiddleware::class, 'beforeAfter2')
    ->name('test.EventMiddleware2');

Route::get('/test-event/controller/middleware/args1')
    ->controller(HTestEventController::class, 'testEventArgs1')
    ->before(EventMiddleware::class, 'testMdEventArgs1')
    ->name('test.EventArgs1');

Route::get('/test-event/controller/middleware/controller/1')
    ->controller(HTestEventController::class, 'checkController1')
    ->before(EventMiddleware::class, 'checkMiddleware1')
    ->before(EventMiddleware::class, 'checkMiddleware2')
    ->after(EventMiddleware::class, 'checkMiddleware3')
    ->name('test.EventMiddleware3');

Route::get('/test-event/controller/module')
    ->module('example-test', EventModuleController::class, 'index')
    ->name('test.EventModule');

Route::get('/test-event/controller/module/event/1')
    ->module('example-test', EventModuleController::class, 'eventAfterOnce1')
    ->name('test.EventModule1');

Route::get('/test-event/controller/module/event/2')
    ->module('example-test', EventModuleController::class, 'eventAfterOnce2')
    ->name('test.EventModule2');

Route::get('/test-event/controller/module/event/args/1')
    ->module('example-test', EventModuleController::class, 'eventArgs1')
    ->name('test.EventModule3');

Route::get('/test-event/controller/event/after/1')
    ->controller(HTestEventController::class, 'testEventAfterOnce1')
    ->name('test.EventAfterOnce1');

Route::get('/test-event/controller/event/after/2')
    ->controller(HTestEventController::class, 'testEventAfter2')
    ->name('test.EventAfter2');
