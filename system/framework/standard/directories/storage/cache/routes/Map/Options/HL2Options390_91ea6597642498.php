<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options390_91ea6597642498
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
          'route' => 'test-module/group/level3/second/middleware',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-module/group/level3/second/middleware',
      'module' =>  [
          'method' => 'module',
          'name' => 'feature-group/feature-level3/second-feature',
          'class' => 'Modules\FeatureGroup\FeatureLevel3\SecondFeature\Controllers\Level3SecondGroupModuleController',
          'class-method' => 'index',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'Modules\FeatureGroup\FeatureLevel3\SecondFeature\Middleware\Level3SecondGroupMiddlewareController',
              'class-method' => 'index',
              'from-group' => false,
              'related-data' =>  [],
          ],
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
