<?php

use App\Controllers\Dir\Post\H2bTest0VariableParamController;
use App\Controllers\HTest0BaseController;
use App\Controllers\HTest0DynamicValController;
use App\Controllers\Dir\Post\H2bTest0DynamicParamController;
use App\Middlewares\HlTestExampleMiddleware;
use App\Middlewares\Dir\NestedMiddleware;
use App\Controllers\HTest0RequestController;
use App\Controllers\HTest0AddressController;
use App\Controllers\HTest0SettingsController;
use App\Controllers\HTest0FuncController;
use App\Controllers\HTest0DtoController;
use App\Middlewares\DtoMiddleware;

Route::get('/0/', 'RIGHT_WAY');
Route::get('/', 'INDEX');

// Базовая работоспособность маршрутизатора.
Route::get('/test/', 'SUCCESS');

// Проверка отдельного запроса options, который может быть только с контроллером.
// Чтобы не вызвать метод по умолчанию, он должен быть первоочередным к другим методам с таким-же маршрутом.
Route::options('/example/test/')
    ->controller('App\Controllers\HTest0BaseController@simulateOptions');

Route::get('/example/test/', 'EXAMPLE-GET');
Route::post('/example/test/', 'EXAMPLE-POST');
Route::delete('/example/test/', 'EXAMPLE-DELETE');
Route::patch('/example/test/', 'EXAMPLE-PATCH');
Route::put('/example/test/', 'EXAMPLE-PUT');

// Проверка использования шаблона.
Route::get('/views/test/template/', view('test'));
Route::get('/views/test/nested/template/', view('base/base-view_Name1.test'));
Route::get('/views/test/nested/template/extension/', view('base/base-view_Name1.test.php'));

// Маршрут с непостоянной длиной.
Route::get('/views/test/template/end/part?/', view('test'));

// Проверка использования шаблона в контроллере.
Route::get('/example/test/controller/view/')
    ->controller('App\Controllers\HTest0BaseController@usingView');

// Проверка вывода JSON в контроллере.
Route::get('/example/test/controller/json/')
    ->controller('App\Controllers\HTest0BaseController@getJson');

// Запрос контроллера при конкретном указании класса.
Route::get('/example/test/controller/json/')
    ->controller(HTest0BaseController::class, 'getJson');

// Запрос контроллера из другого контроллера.
Route::get('/example/test/controller/controller/')
    ->controller(HTest0BaseController::class, 'insertController');

// Проверка динамического маршрута.
Route::get('/dinamic/test/{first}')
    ->controller(HTest0DynamicValController::class);

Route::get('/dinamic/test/{first}/view')
    ->controller(HTest0DynamicValController::class, 'usingTemplate');

Route::get('/dinamic/test/{first}/{second}/{third}/')
    ->controller(HTest0DynamicValController::class, 'usingTemplate');

Route::get('/dinamic/inexact/{first}/{second}/{third?}/')
    ->controller(HTest0DynamicValController::class, 'usingTemplate');

// Проверка условий where()
Route::get('/dinamic/where/{first}/{second}/')
    ->controller(HTest0DynamicValController::class, 'usingTemplate')
    ->where(['first' => '[0-9]+', 'second' => '[a-z]+']);

Route::get('/dinamic/where/{first}/{second?}/')
    ->controller(HTest0DynamicValController::class, 'usingTemplate')
    ->where(['first' => '[A-Z]+', 'second' => '[0-9]+']);

Route::get('/dinamic/where/user/name/@{first}')
    ->controller(HTest0DynamicValController::class, 'usingTemplate')
    ->where(['first' => '[a-z]+']);

Route::get('/dinamic/where/user/name/@{first}/1')
    ->controller(HTest0DynamicValController::class, 'usingTemplate')
    ->where(['first' => '[a-z]+']);

Route::get('/dinamic/where/user/name/@{first}/2')
    ->controller(HTest0DynamicValController::class, 'usingTemplate')
    ->where(['first' => '[a-z]+']);

Route::get('/dinamic/where/user/name/@second/{first}')
    ->controller(HTest0DynamicValController::class, 'usingTemplate')
    ->where(['first' => '[a-z]+']);;

Route::get('/dinamic/where/full/regexp/{first}')
    ->controller(HTest0DynamicValController::class, 'usingTemplate')
    ->where(['first' => '/^[a-z]+$/i']);

Route::get('/dinamic/where/simple/{first}/{second}/')
    ->controller(HTest0DynamicValController::class, 'usingTemplate')
    ->where(['second' => '[a-z]+']);

// Проверка подстановочных маршрутов.
Route::get('/dinamic-where-replace/{first}/{second}/{third}/{fourth}/')
    ->controller('App\Controllers\Dir\Get\<first>0Dynamic<second>Controller@<third>From<fourth>');

Route::match(['get', 'post'], '/dinamic-where-replace/method/{first}/')
    ->controller('App\Controllers\Dir\[verb]\H2bTest0DynamicParamController@[verb]From<first>[verb]');

// Запрос может быть только POST, так как контроллер постоянный.
Route::any('/dinamic-where-replace/method-once/{first}/')
    ->controller(H2bTest0DynamicParamController::class, '[verb]From<first>[verb]');
Route::any('/dinamic-where-replace/method-controller/{first}/')
    ->controller('App\Controllers\Dir\[verb]\H2bTest0Dynamic[verb]Controller@[verb]From<first>[verb]');

// Тестирование вариативных маршрутов.
Route::get('/test-variable/...0-3,5', 'VARIABLE=0-3,5');
Route::get('/test-variable-require/level/...1,3-5,7', 'VARIABLE-REQUIRE=1,3-5,7');
Route::get('/test-variable-data/...0-6')->controller(H2bTest0VariableParamController::class, 'data');
Route::get('/test-variable-url/...0-6')->controller(H2bTest0VariableParamController::class, 'url')->name('test.variable.url');

Route::toGroup()->prefix('/test-group-root-1/');
    Route::get('/', 'SUCCESS-GET-GROUP-ROOT');
Route::endGroup();

// Защита маршрутов от CSRF.
Route::get('/test-protect/get-method', 'SUCCESS-GET-TEXT')->protect();
Route::toGroup()->protect();
    Route::get('/test-protect/get-group', 'SUCCESS-GET-GROUP-TEXT');
Route::endGroup();

// Проверка групп.
Route::toGroup()->prefix('/test-group-prefix-1/')->prefix('/prefix-2/');
    Route::get('/group-get-1/', 'BASE-1-GROUP-1');
    Route::get('/group-get-2/', 'BASE-2-GROUP-1');
    Route::get('/group-get-3/', 'BASE-3-GROUP-1');
    Route::post('/group-post-1/', 'BASE-4-GROUP-1');
    Route::toGroup()->prefix('/group-2-prefix-3/');
        Route::get('/group-get-1/', 'BASE-1-GROUP-1-2');
        Route::get('/group-get-2/', 'BASE-2-GROUP-1-2');
        Route::post('/group-post-3/', 'BASE-3-GROUP-1-2');
        Route::toGroup()->prefix('/group-3-prefix-4/');
              Route::get('/group-get-1/', 'BASE-1-GROUP-1-2-3');
              Route::post('/group-post-1/', 'BASE-2-GROUP-1-2-3');
        Route::endGroup();
    Route::endGroup();
    Route::get('/group-get-4/', 'BASE-5-GROUP-1');
Route::endGroup();

Route::toGroup()->where(['number' => '[0-9]+']);
    Route::get('/test-where-group/{number}/1', 'SUCCESS-WHERE-GROUP-TEXT-1');
    Route::get('/test-where-group/{number}/2', 'SUCCESS-WHERE-GROUP-TEXT-2');
Route::endGroup();

Route::toGroup()
    ->prefix('/alternative-group')
    ->group(function() {
        Route::get('/test-where-group/1', 'SUCCESS-WHERE-ALTERNATIVE=GROUP-TEXT-1');
        Route::get('/test-where-group/2', 'SUCCESS-WHERE-ALTERNATIVE=GROUP-TEXT-2');
    });

Route::toGroup()->prefix('/test-where-group/{number}')->where(['number' => '[0-9]+', 'position' => '[0-9]+']);
    Route::get('/in/{position}/1', 'SUCCESS-WHERE-GROUP-POSITION-1');
    Route::get('/in/{name}/2', 'SUCCESS-WHERE-GROUP-NAME-2')->where(['name' => '[a-z]+']);
Route::endGroup();

Route::toGroup()->prefix('/test-where-group')
    ->where(['number' => '[0-9]+'])
    ->prefix('/{number}')
    ->where(['position' => '[0-9]+']);
    Route::get('/in/{position}/3', 'SUCCESS-WHERE-GROUP-POSITION-3');
Route::endGroup();

Route::get('/test-after/get-method/', 'SUCCESS-GET-A-TEXT')
    ->after(HlTestExampleMiddleware::class, 'after');

Route::toGroup()
    ->prefix('/test-after-group/')
    ->before(NestedMiddleware::class)
    ->after(NestedMiddleware::class, 'afterFirst')
    ->after( 'App\Middlewares\Dir\NestedMiddleware', 'afterSecond');
    Route::get('/get-method/', 'SUCCESS-GET-A-TEXT')
        ->after( 'App\Middlewares\Dir\NestedMiddleware@afterFirst')
        ->after( 'App\Middlewares\Dir\NestedMiddleware', 'afterSecond');
Route::endGroup();

Route::get('/test-before/get-method/', 'SUCCESS-GET-B-TEXT')
    ->before(HlTestExampleMiddleware::class);

Route::toGroup()
    ->prefix('/test-before-group/')
    ->before(NestedMiddleware::class)
    ->before(NestedMiddleware::class, 'example');
    Route::get('/get-method/', 'SUCCESS-GET-B-TEXT')
        ->before( 'App\Middlewares\Dir\NestedMiddleware@first')
        ->before( 'App\Middlewares\Dir\NestedMiddleware', 'second');
Route::endGroup();

Route::get('/test-middleware/get-method/', 'SUCCESS-GET-TEXT')
    ->middleware(HlTestExampleMiddleware::class);

Route::get('/test-middleware/data/', 'SUCCESS-GET-DATA')
    ->middleware(HlTestExampleMiddleware::class, 'getData', ['param1' => '1001', 'param2' => 3.50]);

Route::get('/test-middleware/json/', 'ERROR-GET-DATA')
    ->middleware(HlTestExampleMiddleware::class, 'getJson');

Route::get('/test-middleware/integer/', 'INTEGER-GET-DATA')
    ->middleware(HlTestExampleMiddleware::class, 'getInt');

Route::get('/test-middleware-variable/get-method/', 'SUCCESS-GET-TEXT')
    ->middleware(HlTestExampleMiddleware::class)
    ->middleware(HlTestExampleMiddleware::class, 'example')
    ->middleware( 'App\Middlewares\HlTestExampleMiddleware@example')
    ->middleware( 'App\Middlewares\HlTestExampleMiddleware', 'example');

Route::post('/test-middleware-variable/post-method/', 'SUCCESS-POST-TEXT')
    ->middleware(NestedMiddleware::class)
    ->middleware(NestedMiddleware::class, 'example')
    ->middleware( 'App\Middlewares\Dir\NestedMiddleware@example')
    ->middleware( 'App\Middlewares\Dir\NestedMiddleware', 'example');

Route::toGroup()
    ->prefix('/test-middleware-group/')
    ->middleware(NestedMiddleware::class)
    ->middleware(NestedMiddleware::class, 'example');
    Route::get('/get-method/', 'SUCCESS-GET-TEXT')
       ->middleware( 'App\Middlewares\Dir\NestedMiddleware@first')
       ->middleware( 'App\Middlewares\Dir\NestedMiddleware', 'second');
Route::endGroup();

Route::get('/test-middleware-error/', 'ERROR-TEXT')
    ->middleware(HlTestExampleMiddleware::class, 'error');

Route::get('/test-route-types/get/', 'ROUTE-GET');

Route::any('/test-route-types/any/', 'ROUTE-ANY');

Route::match(['get', 'post'], '/test-route-types/match', 'ROUTE-MATCH[GET,POST]');

Route::match(['put', 'delete'], '/test-route-types/match', 'ROUTE-MATCH[PUT,DELETE]');


Route::get('/test-route-name/controller/')
    ->controller(HTest0BaseController::class, 'getName')
    ->name('Route-name');

Route::get('/test-name-duplicate', 'Undefined')->name('Name-01.duplicate');

Route::fallback('404.NOT_FOUND_FALLBACK-GET', ['GET'])->name('404.get');
Route::fallback('404.NOT_FOUND_FALLBACK-POST', ['POST'])->name('404.post');
Route::fallback('404.NOT_FOUND_FALLBACK-PATCH', ['PATCH'])->name('404.patch');
Route::fallback('404.NOT_FOUND_FALLBACK-PUT', ['PUT'])->name('404.put');
Route::fallback('404.NOT_FOUND_FALLBACK-DELETE', ['DELETE'])->name('404.delete');

// Проверка домена (метод перезаписывает предыдущий /test/)
Route::get('/test-domain/', 'NEW-DOMAIN-1-SUCCESS')->domain('new-site')->domain('com', 1);
Route::get('/test-domain/', 'NEW-DOMAIN-2-SUCCESS')->domain('site')->domain('com', 1);

Route::get('/test-domain/domain-group/', 'NEW-DOMAIN-3-SUCCESS')
    ->domain('subdomain', 3)
    ->domain('new-site')
    ->domain('com', 1);

Route::get('/test-domain/subdomain-group/', 'DOMAIN-2-SUCCESS-V1')
    ->domain(['sub1', 'sub2', 'sub3'], 3)
    ->domain('new-site')
    ->domain('com', 1);

Route::get('/test-domain/domain-group/', 'DOMAIN-2-SUCCESS-GROUP')
    ->domain(['start', '*'], 5)
    ->domain(['psub1', 'psub2', 'psub3'], 4)
    ->domain(['sub1', 'sub2', 'sub3'], 3)
    ->domain(['new-domain', 'domain'])
    ->domain(['com', 'ru'], 1);

Route::get('/test-domain/domain-regex/', 'DOMAIN-REGEX-1-SUCCESS')
    ->domain(['abc1','/^[a-z]+$/i', 'abc2'], 3)
    ->domain('/^[a-z]+\-[0-9]+$/')
    ->domain('/^[com|ru]+$/', 1);

Route::toGroup()
    ->domain('subdomain', 3)
    ->domain('new-site')
    ->domain('com', 1);
    Route::get('/test-domain/from-group/', 'DOMAIN-GROUP-GET-SUCCESS');
    Route::post('/test-domain/from-group/', 'DOMAIN-GROUP-POST-SUCCESS');
Route::endGroup();

// Request
Route::get('/test-request/controller/get')
    ->controller(HTest0RequestController::class, 'getRequestList');
Route::post('/test-request/controller/post')
    ->controller(HTest0RequestController::class, 'getRequestList');
Route::get('/test-request-static/controller/get')
    ->controller(HTest0RequestController::class, 'getRequestStatic');
Route::post('/test-request-static/controller/post')
    ->controller(HTest0RequestController::class, 'getRequestStatic');
Route::get('/test-request-static/method/{name}')
    ->controller(HTest0RequestController::class, 'getServer');
Route::any('/test-request-static/array-param/{num}')
    ->controller(HTest0RequestController::class, 'getParam<num>');

// Для подстановки в функцию поиска по имени маршрута.
Route::match(['get', 'post'],'/dinamic-check-address/where/{first}/{second}/', 'NAME-DATA-SUCCESS')
    ->where(['first' => '[0-9]+', 'second' => '[a-z]+'])
    ->name('dynamicRoute.name');

Route::match(['get', 'post', 'put'], '/test-address/controller/{first}/{second}')
    ->controller(HTest0AddressController::class, 'getAddressData')
     ->name('test-address.name');

Route::match(['get', 'post', 'put'], '/test-address-static/controller/{first}/{second}')
    ->controller(HTest0AddressController::class, 'getAddressStatic')
    ->name('test-address-static.name');

// Settings
Route::get('/test-settings/controller/get')
    ->controller(HTest0SettingsController::class, 'getSettingsData');
Route::get('/test-settings-static/controller/get')
    ->controller(HTest0SettingsController::class, 'getSettingsStatic');

Route::get('/test-dto/controller/get')
    ->controller(HTest0DtoController::class, 'getDtoData')
    ->middleware(DtoMiddleware::class, 'setData')
    ->middleware(DtoMiddleware::class, 'setData');

Route::any('/test-functions/controller/{method}')
    ->controller(HTest0FuncController::class, 'get<method>');

// Проверка использования логирования по уровням в контроллере.
Route::get('/example-test-log/controller/{target}/{type}/{level}/')
    ->controller('App\Controllers\HTest0LogController@use<target>');

// Проверка правильного определения при непостоянной длине маршрута.
Route::get('/example-test-ending/success/{first}/{second}/{end?}', 'ENDING-SUCCESS');
Route::get('/example-test-ending/controller/{first}/{second}/{end?}')
    ->controller('App\Controllers\HTest0EndingRouteController');
Route::get('/example-test-ending-name/controller/{first}/{second}/{end?}')
    ->controller('App\Controllers\HTest0EndingRouteController@<first><second>');

// Проверка на работоспособность с символами потенциально ломающими кеш.
Route::get('\\/test-handle-dangerous-symbols//all\\', 'D\'ARTAGNAN');

Route::get('/example-view-code/controller/view')->controller('App\Controllers\HTest0ViewController@testView');

// Проверка функции view() на установку HTTP-кода.
Route::any('/example-view-code/controller/{code}')->controller('App\Controllers\HTest0ViewController');
Route::get('/example-view-code/func/500', view('base/view.func.test.php', [], 500));
Route::post('/example-view-code/func/404', view('base/view.func.test.php', [], 404));

// Проверка на последовательность вывода.
Route::get('/example-subsequence/controller/{num}')
    ->controller('App\Controllers\HTest0ViewController@subsequence_<num>');


Route::get('/test-ending-empty/{param}/end?', 'TEST-ENDING-EMPTY');

// Проверка дефолтных значений для динамического маршрута.
Route::any('/test-defaults-1/{first}/{second:two}/{third:three}')
    ->controller(HTest0DynamicValController::class, 'usingTemplate')
    ->where(['first' => '[a-z0-9]+', 'second' => '[a-z]+']);

Route::get('/test-defaults-2/{first}/{second:two}/{third:three?}')
    ->controller(HTest0DynamicValController::class, 'usingTemplate')
    ->where(['first' => '[a-z0-9]+', 'second' => '[a-z]+']);


Route::any('set-route-version', 'v2');

Route::any(
     '/test-route-preview/text/{name}/{value?}',
     preview('ROUTE:{{route}}_PARAM[NAME]:{%name%}_PARAM[VALUE]:{%value%}_METHOD:{{method}}')
);

Route::any(
    '/test-route-preview/json/{name}/{value?}',
    preview('{"route": "{{route}}", "name": "{%name%}", "value": "{%value%}", "method": "{{method}}"}')
);
