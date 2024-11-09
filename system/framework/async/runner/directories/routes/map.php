<?php

use App\Controllers\HTest0AsyncRollbackController;
use App\Controllers\HTest0AsyncSessionController;

// Базовая проверка асинхронного запроса.
Route::get('/test/', 'ASYNC-SUCCESS');

// Проверка сессий
Route::get('/test-session/controller/')->controller(HTest0AsyncSessionController::class, 'setSession');

Route::get('/test-extended-session/controller/{num}')->controller(HTest0AsyncSessionController::class, '<num>');

// Проверка COOKIES
Route::get('/test-cookies/controller/')->controller(HTest0AsyncSessionController::class, 'setCookies');

// Проверка на последовательность вывода
Route::get('/example-subsequence/controller/{num}')->controller('App\Controllers\HTest0AsyncViewController@subsequence_<num>');

// Проверка COOKIES
Route::get('/test-rollback/controller/{level}')->controller(HTest0AsyncRollbackController::class, 'check');
