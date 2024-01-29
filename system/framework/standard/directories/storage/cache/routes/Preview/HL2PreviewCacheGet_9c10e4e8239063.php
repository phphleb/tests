<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
*/

/**
* @internal
*/
final class HL2PreviewCacheGet_9c10e4e8239063
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
          'a' => 'dinamic/where/full/regexp/{first}',
          'k' => 50,
          'f' => 'dinamic',
          'w' =>  [
              'first' => '/^[a-z]+$/i',
          ],
          'd' => 1,
      ],
       [
          'a' => 'dinamic/where/simple/{first}/{second}',
          'k' => 53,
          'f' => 'dinamic',
          'w' =>  [
              'second' => '[a-z]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'dinamic-where-replace/{first}/{second}/{third}/{fourth}',
          'k' => 56,
          'f' => 'dinamic-where-replace',
          'd' => 1,
      ],
       [
          'a' => 'dinamic-where-replace/method/{first}',
          'k' => 58,
          'f' => 'dinamic-where-replace',
          'd' => 1,
      ],
       [
          'a' => 'dinamic-where-replace/method-once/{first}',
          'k' => 60,
          'f' => 'dinamic-where-replace',
          'd' => 1,
      ],
       [
          'a' => 'dinamic-where-replace/method-controller/{first}',
          'k' => 62,
          'f' => 'dinamic-where-replace',
          'd' => 1,
      ],
       [
          'a' => 'test-variable/...0-3,5',
          'k' => 64,
          'f' => 'test-variable',
          'm' => 1,
      ],
       [
          'a' => 'test-variable-require/level/...1,3-5,7',
          'k' => 65,
          'f' => 'test-variable-require',
          'm' => 1,
      ],
       [
          'a' => 'test-protect/get-method',
          'k' => 66,
          'f' => 'test-protect',
          'p' =>  [
              'CSRF',
          ],
      ],
       [
          'a' => 'test-protect/get-group',
          'k' => 70,
          'f' => 'test-protect',
          'p' =>  [
              'CSRF',
          ],
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-get-1',
          'k' => 75,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-get-2',
          'k' => 76,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-get-3',
          'k' => 77,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-2-prefix-3/group-get-1',
          'k' => 81,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-2-prefix-3/group-get-2',
          'k' => 82,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-2-prefix-3/group-3-prefix-4/group-get-1',
          'k' => 86,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-get-4',
          'k' => 90,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-where-group/{number}/1',
          'k' => 94,
          'f' => 'test-where-group',
          'w' =>  [
              'number' => '[0-9]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'test-where-group/{number}/2',
          'k' => 95,
          'f' => 'test-where-group',
          'w' =>  [
              'number' => '[0-9]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'test-where-group/{number}/in/{position}/1',
          'k' => 100,
          'f' => 'test-where-group',
          'w' =>  [
              'number' => '[0-9]+',
              'position' => '[0-9]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'test-where-group/{number}/in/{name}/2',
          'k' => 101,
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
          'k' => 109,
          'f' => 'test-where-group',
          'w' =>  [
              'number' => '[0-9]+',
              'position' => '[0-9]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'test-after/get-method',
          'k' => 111,
          'f' => 'test-after',
      ],
       [
          'a' => 'test-after-group/get-method',
          'k' => 118,
          'f' => 'test-after-group',
      ],
       [
          'a' => 'test-before/get-method',
          'k' => 122,
          'f' => 'test-before',
      ],
       [
          'a' => 'test-before-group/get-method',
          'k' => 128,
          'f' => 'test-before-group',
      ],
       [
          'a' => 'test-middleware/get-method',
          'k' => 132,
          'f' => 'test-middleware',
      ],
       [
          'a' => 'test-middleware/data',
          'k' => 134,
          'f' => 'test-middleware',
      ],
       [
          'a' => 'test-middleware/json',
          'k' => 136,
          'f' => 'test-middleware',
      ],
       [
          'a' => 'test-middleware/integer',
          'k' => 138,
          'f' => 'test-middleware',
      ],
       [
          'a' => 'test-middleware-variable/get-method',
          'k' => 140,
          'f' => 'test-middleware-variable',
      ],
       [
          'a' => 'test-middleware-group/get-method',
          'k' => 154,
          'f' => 'test-middleware-group',
      ],
       [
          'a' => 'test-middleware-error',
          'k' => 158,
          'f' => 'test-middleware-error',
          's' => 1,
      ],
       [
          'a' => 'test-route-types/get',
          'k' => 160,
          'f' => 'test-route-types',
      ],
       [
          'a' => 'test-route-types/any',
          'k' => 161,
          'f' => 'test-route-types',
      ],
       [
          'a' => 'test-route-types/match',
          'k' => 162,
          'f' => 'test-route-types',
      ],
       [
          'a' => 'test-route-name/controller',
          'k' => 164,
          'f' => 'test-route-name',
          'i' => 'Route-name',
      ],
       [
          'a' => 'test-name-duplicate',
          'k' => 167,
          'f' => 'test-name-duplicate',
          'i' => 'Name-01.duplicate',
          's' => 1,
      ],
       [
          'a' => 'test-domain',
          'k' => 169,
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
          'k' => 172,
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
          'k' => 175,
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
          'k' => 179,
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
          'k' => 183,
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
          'k' => 189,
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
          'k' => 197,
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
          'k' => 200,
          'f' => 'test-request',
      ],
       [
          'a' => 'test-request-static/controller/get',
          'k' => 204,
          'f' => 'test-request-static',
      ],
       [
          'a' => 'test-request-static/method/{name}',
          'k' => 208,
          'f' => 'test-request-static',
          'd' => 1,
      ],
       [
          'a' => 'test-request-static/array-param/{num}',
          'k' => 210,
          'f' => 'test-request-static',
          'd' => 1,
      ],
       [
          'a' => 'dinamic-check-address/where/{first}/{second}',
          'k' => 212,
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
          'k' => 215,
          'f' => 'test-address',
          'i' => 'test-address.name',
          'd' => 1,
      ],
       [
          'a' => 'test-address-static/controller/{first}/{second}',
          'k' => 218,
          'f' => 'test-address-static',
          'i' => 'test-address-static.name',
          'd' => 1,
      ],
       [
          'a' => 'test-settings/controller/get',
          'k' => 221,
          'f' => 'test-settings',
      ],
       [
          'a' => 'test-settings-static/controller/get',
          'k' => 223,
          'f' => 'test-settings-static',
      ],
       [
          'a' => 'test-dto/controller/get',
          'k' => 225,
          'f' => 'test-dto',
      ],
       [
          'a' => 'test-functions/controller/{method}',
          'k' => 229,
          'f' => 'test-functions',
          'd' => 1,
      ],
       [
          'a' => 'example-test-log/controller/{target}/{type}/{level}',
          'k' => 231,
          'f' => 'example-test-log',
          'd' => 1,
      ],
       [
          'a' => 'example-test-ending/success/{first}/{second}/{end?}',
          'k' => 233,
          'f' => 'example-test-ending',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'example-test-ending/controller/{first}/{second}/{end?}',
          'k' => 234,
          'f' => 'example-test-ending',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'example-test-ending-name/controller/{first}/{second}/{end?}',
          'k' => 236,
          'f' => 'example-test-ending-name',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'test-handle-dangerous-symbols/all',
          'k' => 238,
          'f' => 'test-handle-dangerous-symbols',
      ],
       [
          'a' => 'example-view-code/controller/view',
          'k' => 239,
          'f' => 'example-view-code',
      ],
       [
          'a' => 'example-view-code/controller/{code}',
          'k' => 241,
          'f' => 'example-view-code',
          'd' => 1,
      ],
       [
          'a' => 'example-view-code/func/500',
          'k' => 243,
          'f' => 'example-view-code',
      ],
       [
          'a' => 'example-subsequence/controller/{num}',
          'k' => 245,
          'f' => 'example-subsequence',
          'd' => 1,
      ],
       [
          'a' => 'set-route-version',
          'k' => 247,
          'f' => 'set-route-version',
          's' => 1,
      ],
       [
          'a' => '/',
          'k' => 248,
          'f' => '/',
          's' => 1,
      ],
       [
          'a' => 'test/include/main',
          'k' => 249,
          'f' => 'test',
      ],
       [
          'a' => 'test-controller-response/{type}',
          'k' => 250,
          'f' => 'test-controller-response',
          'd' => 1,
      ],
       [
          'a' => 'test-config/custom/value',
          'k' => 252,
          'f' => 'test-config',
          'i' => 'test.Config.custom',
      ],
       [
          'a' => 'test-attribute/controller/disable/off',
          'k' => 255,
          'f' => 'test-attribute',
      ],
       [
          'a' => 'test-attribute/controller/disable/on',
          'k' => 257,
          'f' => 'test-attribute',
      ],
       [
          'a' => 'test-attribute/controller/purpose/full',
          'k' => 259,
          'f' => 'test-attribute',
      ],
       [
          'a' => 'test-attribute/controller/purpose/external',
          'k' => 261,
          'f' => 'test-attribute',
      ],
       [
          'a' => 'test-attribute/controller/purpose/console',
          'k' => 263,
          'f' => 'test-attribute',
      ],
       [
          'a' => 'di/controller/methods/getConstruct',
          'k' => 265,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/empty-construct',
          'k' => 267,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/methods/index',
          'k' => 269,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/methods/twoArgs',
          'k' => 271,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/methods/manyArgs',
          'k' => 273,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/methods/manyArgs',
          'k' => 275,
          'f' => 'di',
      ],
       [
          'a' => 'di/controller/methods/dynamicArgs/{arg1}/{arg2?}',
          'k' => 277,
          'f' => 'di',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'di/controller/methods/getBefore',
          'k' => 279,
          'f' => 'di',
      ],
       [
          'a' => 'test-container/controller/{type}/{num}',
          'k' => 281,
          'f' => 'test-container',
          'i' => 'test.Container',
          'd' => 1,
      ],
       [
          'a' => 'test-module/base-template/1',
          'k' => 284,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/base-template/2',
          'k' => 286,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/base-template/3',
          'k' => 288,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/base-template/verbs',
          'k' => 290,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/base-params/check-params',
          'k' => 292,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/base-template/dynamic/{target}',
          'k' => 294,
          'f' => 'test-module',
          'd' => 1,
      ],
       [
          'a' => 'test-module/named/{item}/{target}',
          'k' => 296,
          'f' => 'test-module',
          'd' => 1,
      ],
       [
          'a' => 'test-module/group/first/controller',
          'k' => 298,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/group/second/middleware',
          'k' => 300,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/group/level3/first/controller',
          'k' => 303,
          'f' => 'test-module',
      ],
       [
          'a' => 'test-module/group/level3/second/middleware',
          'k' => 305,
          'f' => 'test-module',
      ],
       [
          'a' => 'header-controller/{value}',
          'k' => 308,
          'f' => 'header-controller',
          'd' => 1,
      ],
       [
          'a' => 'test-cache/controller/{method}',
          'k' => 310,
          'f' => 'test-cache',
          'd' => 1,
      ],
       [
          'a' => 'test-before-action/controller',
          'k' => 312,
          'f' => 'test-before-action',
      ],
       [
          'a' => 'test-controller-method-name/controller',
          'k' => 314,
          'f' => 'test-controller-method-name',
      ],
       [
          'a' => 'test-controller-method-name/controller/container',
          'k' => 316,
          'f' => 'test-controller-method-name',
      ],
       [
          'a' => 'psr/controller/logger/{number}',
          'k' => 318,
          'f' => 'psr',
          'd' => 1,
      ],
       [
          'a' => 'psr/controller/container/{number}',
          'k' => 320,
          'f' => 'psr',
          'd' => 1,
      ],
       [
          'a' => 'test-event/controller/index',
          'k' => 322,
          'f' => 'test-event',
          'i' => 'test.EventContainer',
      ],
       [
          'a' => 'test-event/controller/event/args/1',
          'k' => 325,
          'f' => 'test-event',
          'i' => 'test.EventControllerArgs1',
      ],
       [
          'a' => 'test-event/controller/event/args/2',
          'k' => 328,
          'f' => 'test-event',
          'i' => 'test.EventControllerArgs2',
      ],
       [
          'a' => 'test-event/controller/middleware',
          'k' => 331,
          'f' => 'test-event',
          'i' => 'test.EventMiddleware',
      ],
       [
          'a' => 'test-event/controller/middleware/2',
          'k' => 335,
          'f' => 'test-event',
          'i' => 'test.EventMiddleware2',
      ],
       [
          'a' => 'test-event/controller/middleware/args1',
          'k' => 339,
          'f' => 'test-event',
          'i' => 'test.EventArgs1',
      ],
       [
          'a' => 'test-event/controller/middleware/controller/1',
          'k' => 343,
          'f' => 'test-event',
          'i' => 'test.EventMiddleware3',
      ],
       [
          'a' => 'test-event/controller/module',
          'k' => 349,
          'f' => 'test-event',
          'i' => 'test.EventModule',
      ],
       [
          'a' => 'test-event/controller/module/event/1',
          'k' => 352,
          'f' => 'test-event',
          'i' => 'test.EventModule1',
      ],
       [
          'a' => 'test-event/controller/module/event/2',
          'k' => 355,
          'f' => 'test-event',
          'i' => 'test.EventModule2',
      ],
       [
          'a' => 'test-event/controller/module/event/args/1',
          'k' => 358,
          'f' => 'test-event',
          'i' => 'test.EventModule3',
      ],
       [
          'a' => 'test-event/controller/event/after/1',
          'k' => 361,
          'f' => 'test-event',
          'i' => 'test.EventAfterOnce1',
      ],
       [
          'a' => 'test-event/controller/event/after/2',
          'k' => 364,
          'f' => 'test-event',
          'i' => 'test.EventAfter2',
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
