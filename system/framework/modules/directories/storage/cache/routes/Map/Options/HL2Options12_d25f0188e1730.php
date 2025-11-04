<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options12_d25f0188e1730
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
          'route' => 'test-views',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-views',
      'module' =>  [
          'method' => 'module',
          'name' => 'open',
          'class' => 'Products\Open\Controllers\HlTestViewModuleController',
          'class-method' => 'index',
          'code' => '@/routes/map.php:28',
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
