<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2PreviewCacheGet_837c8d6ef41993
{
    /**
    * @internal
    */
    private static array $data =[
       [
          'a' => '*',
          'k' => 1,
          'f' => '*',
          'i' => '404.get',
          's' => 1,
          'c' => 1,
      ],
       [
          'a' => '0',
          'k' => 11,
          'f' => '0',
          's' => 1,
      ],
       [
          'a' => '/',
          'k' => 12,
          'f' => '/',
          's' => 1,
      ],
       [
          'a' => 'test',
          'k' => 13,
          'f' => 'test',
          's' => 1,
      ],
       [
          'a' => 'example/test',
          'k' => 16,
          'f' => 'example',
      ],
       [
          'a' => 'views/test/template',
          'k' => 21,
          'f' => 'views',
      ],
       [
          'a' => 'views/test/nested/template',
          'k' => 22,
          'f' => 'views',
      ],
       [
          'a' => 'views/test/nested/template/extension',
          'k' => 23,
          'f' => 'views',
      ],
       [
          'a' => 'views/test/template/end/part?',
          'k' => 24,
          'f' => 'views',
          'v' => 1,
      ],
       [
          'a' => 'example/test/controller/view',
          'k' => 25,
          'f' => 'example',
      ],
       [
          'a' => 'example/test/controller/json',
          'k' => 27,
          'f' => 'example',
      ],
       [
          'a' => 'example/test/controller/json',
          'k' => 29,
          'f' => 'example',
      ],
       [
          'a' => 'example/test/controller/controller',
          'k' => 31,
          'f' => 'example',
      ],
       [
          'a' => 'dinamic/test/{first}',
          'k' => 33,
          'f' => 'dinamic',
          'd' => 1,
      ],
       [
          'a' => 'dinamic/test/{first}/view',
          'k' => 35,
          'f' => 'dinamic',
          'd' => 1,
      ],
       [
          'a' => 'dinamic/test/{first}/{second}/{third}',
          'k' => 37,
          'f' => 'dinamic',
          'd' => 1,
      ],
       [
          'a' => 'dinamic/inexact/{first}/{second}/{third?}',
          'k' => 39,
          'f' => 'dinamic',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'dinamic/where/{first}/{second}',
          'k' => 41,
          'f' => 'dinamic',
          'w' =>  [
              'first' => '[0-9]+',
              'second' => '[a-z]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'dinamic/where/{first}/{second?}',
          'k' => 44,
          'f' => 'dinamic',
          'w' =>  [
              'first' => '[A-Z]+',
              'second' => '[0-9]+',
          ],
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'dinamic/where/user/name/@{first}',
          'k' => 47,
          'f' => 'dinamic',
          'w' =>  [
              'first' => '[a-z]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'dinamic/where/user/name/@{first}/1',
          'k' => 50,
          'f' => 'dinamic',
          'w' =>  [
              'first' => '[a-z]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'dinamic/where/user/name/@{first}/2',
          'k' => 53,
          'f' => 'dinamic',
          'w' =>  [
              'first' => '[a-z]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'dinamic/where/user/name/@second/{first}',
          'k' => 56,
          'f' => 'dinamic',
          'w' =>  [
              'first' => '[a-z]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'dinamic/where/full/regexp/{first}',
          'k' => 59,
          'f' => 'dinamic',
          'w' =>  [
              'first' => '/^[a-z]+$/i',
          ],
          'd' => 1,
      ],
       [
          'a' => 'dinamic/where/simple/{first}/{second}',
          'k' => 62,
          'f' => 'dinamic',
          'w' =>  [
              'second' => '[a-z]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'dinamic-where-replace/{first}/{second}/{third}/{fourth}',
          'k' => 65,
          'f' => 'dinamic-where-replace',
          'd' => 1,
      ],
       [
          'a' => 'dinamic-where-replace/method/{first}',
          'k' => 67,
          'f' => 'dinamic-where-replace',
          'd' => 1,
      ],
       [
          'a' => 'dinamic-where-replace/method-once/{first}',
          'k' => 69,
          'f' => 'dinamic-where-replace',
          'd' => 1,
      ],
       [
          'a' => 'dinamic-where-replace/method-controller/{first}',
          'k' => 71,
          'f' => 'dinamic-where-replace',
          'd' => 1,
      ],
       [
          'a' => 'test-variable/...0-3,5',
          'k' => 73,
          'f' => 'test-variable',
          'm' => 1,
      ],
       [
          'a' => 'test-variable-require/level/...1,3-5,7',
          'k' => 74,
          'f' => 'test-variable-require',
          'm' => 1,
      ],
       [
          'a' => 'test-group-root-1',
          'k' => 77,
          'f' => 'test-group-root-1',
          's' => 1,
      ],
       [
          'a' => 'test-protect/get-method',
          'k' => 79,
          'f' => 'test-protect',
          'p' =>  [
              'CSRF',
          ],
      ],
       [
          'a' => 'test-protect/get-group',
          'k' => 83,
          'f' => 'test-protect',
          'p' =>  [
              'CSRF',
          ],
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-get-1',
          'k' => 88,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-get-2',
          'k' => 89,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-get-3',
          'k' => 90,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-2-prefix-3/group-get-1',
          'k' => 94,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-2-prefix-3/group-get-2',
          'k' => 95,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-2-prefix-3/group-3-prefix-4/group-get-1',
          'k' => 99,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-get-4',
          'k' => 103,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-where-group/{number}/1',
          'k' => 107,
          'f' => 'test-where-group',
          'w' =>  [
              'number' => '[0-9]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'test-where-group/{number}/2',
          'k' => 108,
          'f' => 'test-where-group',
          'w' =>  [
              'number' => '[0-9]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'alternative-group/test-where-group/1',
          'k' => 112,
          'f' => 'alternative-group',
      ],
       [
          'a' => 'alternative-group/test-where-group/2',
          'k' => 113,
          'f' => 'alternative-group',
      ],
       [
          'a' => 'test-where-group/{number}/in/{position}/1',
          'k' => 118,
          'f' => 'test-where-group',
          'w' =>  [
              'number' => '[0-9]+',
              'position' => '[0-9]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'test-where-group/{number}/in/{name}/2',
          'k' => 119,
          'f' => 'test-where-group',
          'w' =>  [
              'number' => '[0-9]+',
              'position' => '[0-9]+',
              'name' => '[a-z]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'test-where-group/{number}/in/{position}/3',
          'k' => 127,
          'f' => 'test-where-group',
          'w' =>  [
              'number' => '[0-9]+',
              'position' => '[0-9]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'test-after/get-method',
          'k' => 129,
          'f' => 'test-after',
      ],
       [
          'a' => 'test-after-group/get-method',
          'k' => 136,
          'f' => 'test-after-group',
      ],
       [
          'a' => 'test-before/get-method',
          'k' => 140,
          'f' => 'test-before',
      ],
       [
          'a' => 'test-before-group/get-method',
          'k' => 146,
          'f' => 'test-before-group',
      ],
       [
          'a' => 'test-middleware/get-method',
          'k' => 150,
          'f' => 'test-middleware',
      ],
       [
          'a' => 'test-middleware/data',
          'k' => 152,
          'f' => 'test-middleware',
      ],
       [
          'a' => 'test-middleware/json',
          'k' => 154,
          'f' => 'test-middleware',
      ],
       [
          'a' => 'test-middleware/integer',
          'k' => 156,
          'f' => 'test-middleware',
      ],
       [
          'a' => 'test-middleware-variable/get-method',
          'k' => 158,
          'f' => 'test-middleware-variable',
      ],
       [
          'a' => 'test-middleware-group/get-method',
          'k' => 172,
          'f' => 'test-middleware-group',
      ],
       [
          'a' => 'test-middleware-error',
          'k' => 176,
          'f' => 'test-middleware-error',
          's' => 1,
      ],
       [
          'a' => 'test-route-types/get',
          'k' => 178,
          'f' => 'test-route-types',
      ],
       [
          'a' => 'test-route-types/any',
          'k' => 179,
          'f' => 'test-route-types',
      ],
       [
          'a' => 'test-route-types/match',
          'k' => 180,
          'f' => 'test-route-types',
      ],
       [
          'a' => 'test-route-name/controller',
          'k' => 182,
          'f' => 'test-route-name',
          'i' => 'Route-name',
      ],
       [
          'a' => 'test-name-duplicate',
          'k' => 185,
          'f' => 'test-name-duplicate',
          'i' => 'Name-01.duplicate',
          's' => 1,
      ],
       [
          'a' => 'test-domain',
          'k' => 187,
          'f' => 'test-domain',
          's' => 1,
          'h' =>  [
              2 =>  [
                  'new-site',
              ],
              1 =>  [
                  'com',
              ],
          ],
      ],
       [
          'a' => 'test-domain',
          'k' => 190,
          'f' => 'test-domain',
          's' => 1,
          'h' =>  [
              2 =>  [
                  'site',
              ],
              1 =>  [
                  'com',
              ],
          ],
      ],
       [
          'a' => 'test-domain/domain-group',
          'k' => 193,
          'f' => 'test-domain',
          'h' =>  [
              3 =>  [
                  'subdomain',
              ],
              2 =>  [
                  'new-site',
              ],
              1 =>  [
                  'com',
              ],
          ],
      ],
       [
          'a' => 'test-domain/subdomain-group',
          'k' => 197,
          'f' => 'test-domain',
          'h' =>  [
              3 =>  [
                  'sub1',
                  'sub2',
                  'sub3',
              ],
              2 =>  [
                  'new-site',
              ],
              1 =>  [
                  'com',
              ],
          ],
      ],
       [
          'a' => 'test-domain/domain-group',
          'k' => 201,
          'f' => 'test-domain',
          'h' =>  [
              5 =>  [
                  'start',
                  '*',
              ],
              4 =>  [
                  'psub1',
                  'psub2',
                  'psub3',
              ],
              3 =>  [
                  'sub1',
                  'sub2',
                  'sub3',
              ],
              2 =>  [
                  'new-domain',
                  'domain',
              ],
              1 =>  [
                  'com',
                  'ru',
              ],
          ],
      ],
       [
          'a' => 'test-domain/domain-regex',
          'k' => 207,
          'f' => 'test-domain',
          'h' =>  [
              3 =>  [
                  'abc1',
                  '/^[a-z]+$/i',
                  'abc2',
              ],
              2 =>  [
                  '/^[a-z]+\-[0-9]+$/',
              ],
              1 =>  [
                  '/^[com|ru]+$/',
              ],
          ],
      ],
       [
          'a' => 'test-domain/from-group',
          'k' => 215,
          'f' => 'test-domain',
          'h' =>  [
              3 =>  [
                  'subdomain',
              ],
              2 =>  [
                  'new-site',
              ],
              1 =>  [
                  'com',
              ],
          ],
      ],
       [
          'a' => 'test-request/controller/get',
          'k' => 218,
          'f' => 'test-request',
      ],
       [
          'a' => 'test-request-static/controller/get',
          'k' => 222,
          'f' => 'test-request-static',
      ],
       [
          'a' => 'test-request-static/method/{name}',
          'k' => 226,
          'f' => 'test-request-static',
          'd' => 1,
      ],
       [
          'a' => 'test-request-static/array-param/{num}',
          'k' => 228,
          'f' => 'test-request-static',
          'd' => 1,
      ],
       [
          'a' => 'dinamic-check-address/where/{first}/{second}',
          'k' => 230,
          'f' => 'dinamic-check-address',
          'w' =>  [
              'first' => '[0-9]+',
              'second' => '[a-z]+',
          ],
          'i' => 'dynamicRoute.name',
          'd' => 1,
      ],
       [
          'a' => 'test-address/controller/{first}/{second}',
          'k' => 233,
          'f' => 'test-address',
          'i' => 'test-address.name',
          'd' => 1,
      ],
       [
          'a' => 'test-address-static/controller/{first}/{second}',
          'k' => 236,
          'f' => 'test-address-static',
          'i' => 'test-address-static.name',
          'd' => 1,
      ],
       [
          'a' => 'test-settings/controller/get',
          'k' => 239,
          'f' => 'test-settings',
      ],
       [
          'a' => 'test-settings-static/controller/get',
          'k' => 241,
          'f' => 'test-settings-static',
      ],
       [
          'a' => 'test-dto/controller/get',
          'k' => 243,
          'f' => 'test-dto',
      ],
       [
          'a' => 'test-functions/controller/{method}',
          'k' => 247,
          'f' => 'test-functions',
          'd' => 1,
      ],
       [
          'a' => 'example-test-log/controller/{target}/{type}/{level}',
          'k' => 249,
          'f' => 'example-test-log',
          'd' => 1,
      ],
       [
          'a' => 'example-test-ending/success/{first}/{second}/{end?}',
          'k' => 251,
          'f' => 'example-test-ending',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'example-test-ending/controller/{first}/{second}/{end?}',
          'k' => 252,
          'f' => 'example-test-ending',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'example-test-ending-name/controller/{first}/{second}/{end?}',
          'k' => 254,
          'f' => 'example-test-ending-name',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'test-handle-dangerous-symbols/all',
          'k' => 256,
          'f' => 'test-handle-dangerous-symbols',
      ],
       [
          'a' => 'example-view-code/controller/view',
          'k' => 257,
          'f' => 'example-view-code',
      ],
       [
          'a' => 'example-view-code/controller/{code}',
          'k' => 259,
          'f' => 'example-view-code',
          'd' => 1,
      ],
       [
          'a' => 'example-view-code/func/500',
          'k' => 261,
          'f' => 'example-view-code',
      ],
       [
          'a' => 'example-subsequence/controller/{num}',
          'k' => 263,
          'f' => 'example-subsequence',
          'd' => 1,
      ],
       [
          'a' => 'test-ending-empty/{param}/end?',
          'k' => 265,
          'f' => 'test-ending-empty',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'test-defaults-1/{first}/two/three',
          'k' => 266,
          'f' => 'test-defaults-1',
          'w' =>  [
              'first' => '[a-z0-9]+',
              'second' => '[a-z]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'test-defaults-2/{first}/two/three?',
          'k' => 269,
          'f' => 'test-defaults-2',
          'w' =>  [
              'first' => '[a-z0-9]+',
              'second' => '[a-z]+',
          ],
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'set-route-version',
          'k' => 272,
          'f' => 'set-route-version',
          's' => 1,
      ],
       [
          'a' => 'test-route-preview/text/{name}/{value?}',
          'k' => 273,
          'f' => 'test-route-preview',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'test-route-preview/json/{name}/{value?}',
          'k' => 274,
          'f' => 'test-route-preview',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'test-before-action/controller',
          'k' => 275,
          'f' => 'test-before-action',
      ],
       [
          'a' => 'test-controller-method-name/controller',
          'k' => 277,
          'f' => 'test-controller-method-name',
      ],
       [
          'a' => 'test-controller-method-name/controller/container',
          'k' => 279,
          'f' => 'test-controller-method-name',
      ],
       [
          'a' => 'test-attribute/controller/disable/off',
          'k' => 281,
          'f' => 'test-attribute',
      ],
       [
          'a' => 'test-attribute/controller/disable/on',
          'k' => 283,
          'f' => 'test-attribute',
      ],
       [
          'a' => 'test-attribute/controller/purpose/full',
          'k' => 285,
          'f' => 'test-attribute',
      ],
       [
          'a' => 'test-attribute/controller/purpose/external',
          'k' => 287,
          'f' => 'test-attribute',
      ],
       [
          'a' => 'test-attribute/controller/purpose/console',
          'k' => 289,
          'f' => 'test-attribute',
      ],
       [
          'a' => 'test-cache/controller/{method}',
          'k' => 291,
          'f' => 'test-cache',
          'd' => 1,
      ],
       [
          'a' => 'test-config/custom/value',
          'k' => 293,
          'f' => 'test-config',
          'i' => 'test.Config.custom',
      ],
       [
          'a' => 'test-container/controller/{type}/{num}',
          'k' => 296,
          'f' => 'test-container',
          'i' => 'test.Container',
          'd' => 1,
      ],
       [
          'a' => 'di/controller/methods/getConstruct',
          'k' => 299,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/empty-construct',
          'k' => 301,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/methods/index',
          'k' => 303,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/methods/twoArgs',
          'k' => 305,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/methods/manyArgs',
          'k' => 307,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/methods/manyArgs',
          'k' => 309,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/methods/dynamicArgs/{arg1}/{arg2?}',
          'k' => 311,
          'f' => 'di',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'di/controller/methods/getBefore',
          'k' => 313,
          'f' => 'di',
      ],
       [
          'a' => 'test-event/controller/index',
          'k' => 315,
          'f' => 'test-event',
          'i' => 'test.EventContainer',
      ],
       [
          'a' => 'test-event/controller/event/args/1',
          'k' => 318,
          'f' => 'test-event',
          'i' => 'test.EventControllerArgs1',
      ],
       [
          'a' => 'test-event/controller/event/args/2',
          'k' => 321,
          'f' => 'test-event',
          'i' => 'test.EventControllerArgs2',
      ],
       [
          'a' => 'test-event/controller/middleware',
          'k' => 324,
          'f' => 'test-event',
          'i' => 'test.EventMiddleware',
      ],
       [
          'a' => 'test-event/controller/middleware/2',
          'k' => 328,
          'f' => 'test-event',
          'i' => 'test.EventMiddleware2',
      ],
       [
          'a' => 'test-event/controller/middleware/args1',
          'k' => 332,
          'f' => 'test-event',
          'i' => 'test.EventArgs1',
      ],
       [
          'a' => 'test-event/controller/middleware/controller/1',
          'k' => 336,
          'f' => 'test-event',
          'i' => 'test.EventMiddleware3',
      ],
       [
          'a' => 'test-event/controller/module',
          'k' => 342,
          'f' => 'test-event',
          'i' => 'test.EventModule',
      ],
       [
          'a' => 'test-event/controller/module/event/1',
          'k' => 345,
          'f' => 'test-event',
          'i' => 'test.EventModule1',
      ],
       [
          'a' => 'test-event/controller/module/event/2',
          'k' => 348,
          'f' => 'test-event',
          'i' => 'test.EventModule2',
      ],
       [
          'a' => 'test-event/controller/module/event/args/1',
          'k' => 351,
          'f' => 'test-event',
          'i' => 'test.EventModule3',
      ],
       [
          'a' => 'test-event/controller/event/after/1',
          'k' => 354,
          'f' => 'test-event',
          'i' => 'test.EventAfterOnce1',
      ],
       [
          'a' => 'test-event/controller/event/after/2',
          'k' => 357,
          'f' => 'test-event',
          'i' => 'test.EventAfter2',
      ],
       [
          'a' => 'header-controller/{value}',
          'k' => 360,
          'f' => 'header-controller',
          'd' => 1,
      ],
       [
          'a' => '/',
          'k' => 362,
          'f' => '/',
          's' => 1,
      ],
       [
          'a' => 'test/include/main',
          'k' => 363,
          'f' => 'test',
      ],
       [
          'a' => 'test-module/base-template/1',
          'k' => 364,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/base-template/2',
          'k' => 366,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/base-template/3',
          'k' => 368,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/base-template/verbs',
          'k' => 370,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/base-params/check-params',
          'k' => 372,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/base-template/dynamic/{target}',
          'k' => 374,
          'f' => 'test-module',
          'd' => 1,
      ],
       [
          'a' => 'test-module/named/{item}/{target}',
          'k' => 376,
          'f' => 'test-module',
          'd' => 1,
      ],
       [
          'a' => 'test-module/group/first/controller',
          'k' => 378,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/group/second/middleware',
          'k' => 380,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/group/level3/first/controller',
          'k' => 383,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/group/level3/second/middleware',
          'k' => 385,
          'f' => 'test-module',
      ],
       [
          'a' => 'psr/controller/logger/{number}',
          'k' => 388,
          'f' => 'psr',
          'd' => 1,
      ],
       [
          'a' => 'psr/controller/container/{number}',
          'k' => 390,
          'f' => 'psr',
          'd' => 1,
      ],
       [
          'a' => 'test-controller-response/{type}',
          'k' => 392,
          'f' => 'test-controller-response',
          'd' => 1,
      ],
  ];


    /**
    * @internal
    */
    public static function getData(): array
    {
        return self::$data;
    }
}
