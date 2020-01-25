<?php

Route::get("/", "MAIN-PAGE");

Route::get("/test/", "MAIN-TEST");

Route::get("/test-2/{variable}/", "TEST-VARIABLE");

Route::get("/test-3/{variable-where-0-9}/", "TEST-VARIABLE-WHERE-NUMERIC")->where(["variable-where-0-9" => "[0-9]+"]);

Route::get("/test-4/{variable?}/", "TEST-VARIABLE-?");

Route::get("/test-5/{variable1}/{variable2}/", "TEST-DOUBLE-VARIABLE");

Route::get("/test-6/{variable1-where-0-9}/{variable2-where-a-z}/", "TEST-DOUBLE-VARIABLE-WHERE-NUMERIC-AND-ABC")->where(["variable-where-0-9" => "[0-9]+", "variable2-where-a-z" => "[a-z]+"]);

Route::prefix("/test-7-prefix/")->get("/test-7/", "TEST-MAIN-PREFIX");

Route::prefix("/test-7-prefix-1/")->prefix("/test-7-prefix-2/")->get("/test-7/", "TEST-MAIN-DOUBLE-PREFIX");

Route::type("post")->get("/test-8/", "TEST-MAIN-TYPE-POST");

Route::getType('post');

  Route::get("/test-9/1/", "TEST-GET-TYPE-POST-1"); // POST

  Route::type('get')->get("/test-9/2/", "TEST-GET-TYPE-POST-2"); // GET

  Route::get("/test-9/3/", "TEST-GET-TYPE-POST-3"); // POST

Route::endType();

Route::type('post')->type('get')->get("/test-9/4/", "TEST-GET-TYPE-POST-4"); // GET

Route::prefix("/test-10-prefix/")->getGroup(); // Начало группы

   Route::get("/test-10/1/", "TEST-MAIN-GROUP-1");

   Route::get("/test-10/2/", "TEST-MAIN-GROUP-2");

Route::endGroup(); // Завершение группы

Route::prefix("/test-11-prefix/")->getGroup(); // Начало группы 1

  Route::prefix("/test-11-prefix-2/")->getGroup(); // Начало группы 2

    Route::get("/test-11-group/1/", "TEST-IN-GROUP-1");

    Route::get("/test-11-group/2/", "TEST-IN-GROUP-2");

  Route::endGroup(); // Завершение группы 2

    Route::get("/test-11-group/3/", "TEST-IN-GROUP-3");

Route::endGroup(); // Завершение группы 1

Route::prefix('/test-12-1/');
Route::getGroup('Group 1'); // Начало группы "Group 1"

Route::prefix('/test-12-2/');

Route::getGroup(); // Начало группы 2

  Route::get('/a3/', "TEST-NAMED-GROUP-1" ); // "/test-12-1/test-12-2/a3/"

  Route::get('/b3/', "TEST-NAMED-GROUP-2" ); // "/test-12-1/test-12-2/b3/"

Route::endGroup('Group 1'); // Завершение группы "Group 1"

  Route::get( '/test-12-3/', "TEST-NAMED-GROUP-3"); // "/test-12-2/test-12-3/"

Route::endGroup(); // Завершение группы 2

Route::protect()->get('/test-13-pro/', 'TEST-PROTECTED-1');

Route::getProtect();

  Route::get('/test-14/1/', "TEST-GET-PROTECT-1"); // Защищён

  Route::protect('None')->get('/test-14/2/', "TEST-GET-PROTECT-2"); // Не защищён

  Route::get('/test-14/3/', "TEST-GET-PROTECT-3"); // Защищён

Route::endProtect();


