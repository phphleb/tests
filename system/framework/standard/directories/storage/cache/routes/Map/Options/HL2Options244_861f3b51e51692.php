<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options244_861f3b51e51692
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
          'route' => 'test-settings/controller/get',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-settings/controller/get',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0SettingsController',
          'class-method' => 'getSettingsData',
          'code' => '@/routes/map.php:319',
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
