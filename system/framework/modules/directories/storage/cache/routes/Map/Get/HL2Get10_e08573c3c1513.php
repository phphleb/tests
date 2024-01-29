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
final class HL2Get10_e08573c3c1513
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
          'route' => 'test-template',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-template',
      'module' =>  [
          'method' => 'module',
          'name' => 'test',
          'class' => 'Products\Test\Controllers\HlTestInsertTemplateModuleController',
          'class-method' => 'index',
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
