<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Delete278_91ea6597642498
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'any',
      'types' =>  [
          'GET',
          'POST',
          'DELETE',
          'PUT',
          'PATCH',
          'OPTIONS',
          'HEAD',
      ],
      'data' =>  [
          'route' => 'test-route-preview/text/{name}/{value?}',
          'view' => '~{/preview/}ROUTE:{{route}}_PARAM[NAME]:{%name%}_PARAM[VALUE]:{%value%}_METHOD:{{method}}',
      ],
      'actions' =>  [],
      'full-address' => 'test-route-preview/text/{name}/{value?}',
  ];


    /**
    * @internal
    */
    public static function getData(): array
    {
        return self::$data;
    }
}
