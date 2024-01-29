<?php
// Этот маршрут не должен отображаться так как уже указан в map.php
Route::get('/', 'HIDDEN-INDEX');

// Проверка подключения маршрутов.
Route::get('/test/include/main', 'INCLUDE-MAIN-MAP');