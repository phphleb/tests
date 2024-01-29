<?php

use Modules\ExampleTest\Controllers\TemplateModuleController;
use Modules\FeatureGroup\FeatureLevel3\FirstFeature\Controllers\Level3FirstGroupModuleController;
use Modules\FeatureGroup\FeatureLevel3\SecondFeature\Controllers\Level3SecondGroupModuleController;
use Modules\FeatureGroup\FeatureLevel3\SecondFeature\Middleware\Level3SecondGroupMiddlewareController;
use Modules\FeatureGroup\FirstFeature\Controllers\FirstGroupModuleController;
use Modules\FeatureGroup\SecondFeature\Controllers\SecondGroupModuleController;
use Modules\FeatureGroup\SecondFeature\Middleware\SecondGroupMiddlewareController;

Route::get('/test-module/base-template/1')->module('example-test', 'Modules\ExampleTest\Controllers\TemplateModuleController');

Route::get('/test-module/base-template/2')->module('example-test', TemplateModuleController::class);

Route::get('/test-module/base-template/3')->module('example-test', TemplateModuleController::class, 'method');

Route::get('/test-module/base-template/verbs')->module('example-test', 'Modules\ExampleTest\Controllers\TemplateModuleController@[verb]');

Route::get('/test-module/base-params/check-params')->module('example-test', 'Modules\ExampleTest\Controllers\TemplateModuleController@checkParams');

Route::get('/test-module/base-template/dynamic/{target}')->module('example-test', 'Modules\ExampleTest\Controllers\<target>ModuleController@<target>');

Route::get('/test-module/named/{item}/{target}')->module('example-test', 'Modules\ExampleTest\Controllers\Folder<item>\<item>d<target>Controller', '<item><target>[verb]<item>');

Route::get('/test-module/group/first/controller')->module('feature-group/first-feature', FirstGroupModuleController::class);

Route::get('/test-module/group/second/middleware')->module('feature-group/second-feature', SecondGroupModuleController::class)->middleware(SecondGroupMiddlewareController::class);

Route::get('/test-module/group/level3/first/controller')->module('feature-group/feature-level3/first-feature', Level3FirstGroupModuleController::class);

Route::get('/test-module/group/level3/second/middleware')->module('feature-group/feature-level3/second-feature', Level3SecondGroupModuleController::class)->middleware(Level3SecondGroupMiddlewareController::class);