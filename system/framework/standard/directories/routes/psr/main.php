<?php

Route::get('/psr/controller/logger/{number}')
    ->controller('App\Controllers\Psr\HTestPsrController@getLoggerV<number>');

Route::get('/psr/controller/container/{number}')
    ->controller('App\Controllers\Psr\HTestPsrController@getContainerV<number>');