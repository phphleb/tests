<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2PreviewCachePatch_861f3b51e51692
{
    /**
    * @internal
    */
    private static array $data =[
       [
          'a' => '*',
          'k' => 5,
          'f' => '*',
          'i' => '404.patch',
          's' => 1,
          'c' => 1,
      ],
       [
          'a' => 'example/test',
          'k' => 19,
          'f' => 'example',
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
          'a' => 'test-route-types/any',
          'k' => 184,
          'f' => 'test-route-types',
      ],
       [
          'a' => 'test-request-static/array-param/{num}',
          'k' => 233,
          'f' => 'test-request-static',
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
  ];


    /**
    * @internal
    */
    public static function getData(): array
    {
        return self::$data;
    }
}
