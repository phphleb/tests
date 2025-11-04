<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2PreviewCachePost_861f3b51e51692
{
    /**
    * @internal
    */
    private static array $data =[
       [
          'a' => '*',
          'k' => 3,
          'f' => '*',
          'i' => '404.post',
          's' => 1,
          'c' => 1,
      ],
       [
          'a' => 'example/test',
          'k' => 17,
          'f' => 'example',
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
          'a' => 'test-group-prefix-1/prefix-2/group-post-1',
          'k' => 96,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-2-prefix-3/group-post-3',
          'k' => 101,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-2-prefix-3/group-3-prefix-4/group-post-1',
          'k' => 105,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-middleware-variable/post-method',
          'k' => 168,
          'f' => 'test-middleware-variable',
      ],
       [
          'a' => 'test-route-types/any',
          'k' => 184,
          'f' => 'test-route-types',
      ],
       [
          'a' => 'test-route-types/match',
          'k' => 185,
          'f' => 'test-route-types',
      ],
       [
          'a' => 'test-domain/from-group',
          'k' => 221,
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
          'a' => 'test-request/controller/post',
          'k' => 225,
          'f' => 'test-request',
      ],
       [
          'a' => 'test-request-static/controller/post',
          'k' => 229,
          'f' => 'test-request-static',
      ],
       [
          'a' => 'test-request-static/array-param/{num}',
          'k' => 233,
          'f' => 'test-request-static',
          'd' => 1,
      ],
       [
          'a' => 'dinamic-check-address/where/{first}/{second}',
          'k' => 235,
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
          'k' => 238,
          'f' => 'test-address',
          'i' => 'test-address.name',
          'd' => 1,
      ],
       [
          'a' => 'test-address-static/controller/{first}/{second}',
          'k' => 241,
          'f' => 'test-address-static',
          'i' => 'test-address-static.name',
          'd' => 1,
      ],
       [
          'a' => 'test-functions/controller/{method}',
          'k' => 252,
          'f' => 'test-functions',
          'd' => 1,
      ],
       [
          'a' => 'example-view-code/controller/{code}',
          'k' => 264,
          'f' => 'example-view-code',
          'd' => 1,
      ],
       [
          'a' => 'example-view-code/func/404',
          'k' => 267,
          'f' => 'example-view-code',
      ],
       [
          'a' => 'test-defaults-1/{first}/two/three',
          'k' => 271,
          'f' => 'test-defaults-1',
          'w' =>  [
              'first' => '[a-z0-9]+',
              'second' => '[a-z]+',
          ],
          'd' => 1,
      ],
       [
          'a' => 'set-route-version',
          'k' => 277,
          'f' => 'set-route-version',
          's' => 1,
      ],
       [
          'a' => 'test-route-preview/text/{name}/{value?}',
          'k' => 278,
          'f' => 'test-route-preview',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'test-route-preview/json/{name}/{value?}',
          'k' => 279,
          'f' => 'test-route-preview',
          'd' => 1,
          'v' => 1,
      ],
       [
          'a' => 'alias-origin-2/{id}',
          'k' => 402,
          'f' => 'alias-origin-2',
          'i' => 'test.alias.origin.2',
          'd' => 1,
      ],
       [
          'a' => 'prefix/alias-3/{id}',
          'k' => 409,
          'f' => 'prefix',
          'i' => 'test.alias.3',
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
