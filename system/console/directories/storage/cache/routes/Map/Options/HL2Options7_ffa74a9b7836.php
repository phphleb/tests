<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options7_ffa74a9b7836
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'get',
      'types' =>  [
          'GET',
          'OPTIONS',
      ],
      'data' =>  [
          'route' => 'test/module',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test/module',
      'module' =>  [
          'method' => 'module',
          'name' => 'example',
          'class' => 'Modules\Example\Controllers\ExampleModuleController',
          'class-method' => 'get',
          'code' => '@/routes/map.php:14',
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
