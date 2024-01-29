<?php

Route::get('/di/controller/methods/getConstruct')
    ->controller('App\Controllers\Di\HTestDiController@getConstruct');

Route::get('/di/controller/empty-construct/')
    ->controller('App\Controllers\Di\HTestDiControllerEmptyConstruct@notUsed');

Route::get('/di/controller/methods/index')
    ->controller('App\Controllers\Di\HTestDiController@index');

Route::get('/di/controller/methods/twoArgs')
    ->controller('App\Controllers\Di\HTestDiController@twoArgs');

Route::get('/di/controller/methods/manyArgs')
    ->controller('App\Controllers\Di\HTestDiController@manyArgs');

Route::get('/di/controller/methods/manyArgs')
    ->controller('App\Controllers\Di\HTestDiController@manyArgs');

Route::get('/di/controller/methods/dynamicArgs/{arg1}/{arg2?}')
    ->controller('App\Controllers\Di\HTestDiController@dynamicArgs');

Route::get('/di/controller/methods/getBefore')
    ->controller('App\Controllers\Di\HTestDiController@getBefore');
