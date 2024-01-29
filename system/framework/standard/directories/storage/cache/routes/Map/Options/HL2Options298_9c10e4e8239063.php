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
final class HL2Options298_9c10e4e8239063
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
          'route' => 'test-module/group/first/controller',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-module/group/first/controller',
      'module' =>  [
          'method' => 'module',
          'name' => 'feature-group/first-feature',
          'class' => 'Modules\FeatureGroup\FirstFeature\Controllers\FirstGroupModuleController',
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
