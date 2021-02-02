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

    Route::get('/a3/', "TEST-NAMED-GROUP-1"); // "/test-12-1/test-12-2/a3/"

    Route::get('/b3/', "TEST-NAMED-GROUP-2"); // "/test-12-1/test-12-2/b3/"

Route::endGroup('Group 1'); // Завершение группы "Group 1"

Route::get('/test-12-3/', "TEST-NAMED-GROUP-3"); // "/test-12-2/test-12-3/"

Route::endGroup(); // Завершение группы 2

    Route::protect()->get('/test-13-pro/', 'TEST-PROTECTED-1');

    Route::getProtect();

    Route::get('/test-14/1/', "TEST-GET-PROTECT-1"); // Защищён

    Route::protect('None')->get('/test-14/2/', "TEST-GET-PROTECT-2"); // Не защищён

    Route::get('/test-14/3/', "TEST-GET-PROTECT-3"); // Защищён

    Route::endProtect();

    // Работа с поддоменами
    Route::prefix("/test-subdomains/")->getGroup();

        Route::domain(null)->get('/default/', "TEST-SUBDOMAIN-DEFAULT");

        Route::domain("dev")->get('/default/', "TEST-SUBDOMAIN-DEV-1");

    Route::endGroup();

Route::domain("dev1")->getGroup();

Route::get("/test-subdomains/2/", "TEST-SUBDOMAIN-DEV-2"); // dev1.site.com/test-subdomains/2/ или *.dev1.site.com/test-subdomains/2/

Route::endGroup();

Route::get("/test-subdomains/2/", "TEST-SUBDOMAIN-DEV-3"); // все запросы (site.com/test-subdomains/2/ или *.site.com/test-subdomains/2/)

Route::domain("sub4", 4)->domain("sub3")->get("/test-subdomains/4/", "TEST-SUBDOMAIN-DEV-4"); // sub4.sub3.site.com или *.sub4.sub3.site.com

Route::domain(["var1", "var2", null])->get("/test-subdomains/5/", "TEST-SUBDOMAIN-DEV-5");

Route::domain(null)->get("/test-subdomains/6/", "TEST-SUBDOMAIN-DEV-6");

Route::domain("subd1")->domain("subd2")->get("/test-subdomains/7/", "TEST-SUBDOMAIN-DEV-7");

Route::domain("subd3")->domain("*")->get("/test-subdomains/8/", "TEST-SUBDOMAIN-DEV-8");

Route::domain("subd3")->get("/test-subdomains/9/", "TEST-SUBDOMAIN-DEV-9");

Route::domain("subd4", 4)->get("/test-subdomains/10/", "TEST-SUBDOMAIN-DEV-10");


// Тестирование контроллеров

$controllerName = 'Test474eff721eee4c33056ab6a4c91b522bNum1Controller';

$middlewareAfterName = 'Testa30535006038eac8c105b34b05112ca9Num1MiddlewareAfter';

$middlewareBeforeName = 'Test6032ca1ff49c11e8a7a2b17afed6858bMiddlewareBefore';

Route::prefix('test-controller')->getGroup();

    Route::get('/cnt0/')->controller($controllerName);

    Route::get('/cnt1/')->controller($controllerName . '@getTestVariables', ['testValue1', 'testValue2']);

    Route::get('/cnt2/')->controller($controllerName . '@getTestVariables', ['testValue1', 100500]);

    Route::get('/cnt3/')->controller($controllerName)->after($middlewareAfterName);

    Route::get('/cnt4/')->controller($controllerName)->after($middlewareAfterName . '@getTestParams', ['testMValue1', 'testMValue2']);

    Route::get('/cnt5/', "MAIN-PAGE")->after($middlewareAfterName . '@getTestParams', ['testMValue1', 'testMValue2']);

    Route::get('/cnt6/', "MAIN-PAGE")->after($middlewareAfterName . '@getTestParams', ['testMValue1', 100500]);

    Route::before($middlewareBeforeName)->before($middlewareBeforeName)->get('/cnt7/', "MAIN-PAGE")->after($middlewareAfterName)->after($middlewareAfterName);

    Route::before($middlewareBeforeName)->before($middlewareBeforeName . '@getTestParams', ['testMbValue1', 'testMbValue2'])->get('/cnt8/', "MAIN-PAGE");

    Route::before($middlewareBeforeName . '@getTestParams', ['testMbValue11', 'testMbValue21'])->before($middlewareBeforeName . '@getTestParams', ['testMbValue1', 'testMbValue2'])->get('/cnt9/', "MAIN-PAGE");

Route::endGroup();


$compoundName1 = 'Test474eff721eee4c33056ab6a4c91b522bNum1<test>';

$compoundName2 = '<main>474eff721eee4c33056ab6a4c91b522bNum1<test>';

$compoundName3 = '<main>474eff721eee4c33056ab6a4c91b522bNum1<test>';

$compoundName4 = 'Test474eff721eee4c33056ab6a4c91b522bNum1Controller@get<mainx><testx>';

$compoundName5 = '<class1>474eff721eee4c33056ab6a4c91b522bNum1<class2>';

Route::prefix('test-compound-controller')->getGroup();

    Route::get('/cp0/{test}/')->controller($compoundName1);

    Route::get('/cp1/{main}/{test}/')->controller($compoundName1);

    Route::get('/cp2/{main}/{test}/')->controller($compoundName2);

    Route::get('/cp3/{main}/{test}/')->controller($compoundName1 . '@index');

    Route::get('/cp4/{mainx}/{testx}/')->controller($compoundName4);

    Route::get('/cp5/{test}/{method}/')->controller($compoundName1 . '@<method>');

Route::endGroup();



