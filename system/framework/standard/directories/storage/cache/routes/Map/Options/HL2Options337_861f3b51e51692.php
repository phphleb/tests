<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options337_861f3b51e51692
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
          'code' => '@/routes/module/main.php:31',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'Modules\FeatureGroup\FeatureLevel3\SecondFeature\Middleware\Level3SecondGroupMiddlewareController',
              'class-method' => 'index',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/module/main.php:31',
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
