<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2PreviewCachePost_837c8d6ef41993
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
          'k' => 91,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-2-prefix-3/group-post-3',
          'k' => 96,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-group-prefix-1/prefix-2/group-2-prefix-3/group-3-prefix-4/group-post-1',
          'k' => 100,
          'f' => 'test-group-prefix-1',
      ],
       [
          'a' => 'test-middleware-variable/post-method',
          'k' => 163,
          'f' => 'test-middleware-variable',
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
          'a' => 'test-domain/from-group',
          'k' => 216,
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
          'k' => 220,
          'f' => 'test-request',
      ],
       [
          'a' => 'test-request-static/controller/post',
          'k' => 224,
          'f' => 'test-request-static',
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
          'a' => 'test-functions/controller/{method}',
          'k' => 247,
          'f' => 'test-functions',
          'd' => 1,
      ],
       [
          'a' => 'example-view-code/controller/{code}',
          'k' => 259,
          'f' => 'example-view-code',
          'd' => 1,
      ],
       [
          'a' => 'example-view-code/func/404',
          'k' => 262,
          'f' => 'example-view-code',
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
  ];


    /**
    * @internal
    */
    public static function getData(): array
    {
        return self::$data;
    }
}
