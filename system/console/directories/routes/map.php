<?php
/*
 * Карта маршрутизации для тестов.
 */
Route::get('/', 'INDEX');

// Внимание! Следующая строчка должна быть всегда номером 8.
Route::get('/name', 'NAME')->name('test.name');

Route::get('/test/', 'SUCCESS');

Route::get('/test/controller/')->controller('App\Controllers\TestController@methodName');

Route::get('/test/module/')->module('example', 'Modules\Example\Controllers\ExampleModuleController@get');
