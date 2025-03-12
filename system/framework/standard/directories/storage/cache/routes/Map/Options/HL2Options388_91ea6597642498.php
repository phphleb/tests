<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options388_91ea6597642498
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
          'route' => 'test-module/group/level3/first/controller',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-module/group/level3/first/controller',
      'module' =>  [
          'method' => 'module',
          'name' => 'feature-group/feature-level3/first-feature',
          'class' => 'Modules\FeatureGroup\FeatureLevel3\FirstFeature\Controllers\Level3FirstGroupModuleController',
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
