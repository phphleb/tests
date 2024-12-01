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
final class HL2Get380_837c8d6ef41993
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
          'route' => 'test-module/group/second/middleware',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-module/group/second/middleware',
      'module' =>  [
          'method' => 'module',
          'name' => 'feature-group/second-feature',
          'class' => 'Modules\FeatureGroup\SecondFeature\Controllers\SecondGroupModuleController',
          'class-method' => 'index',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'Modules\FeatureGroup\SecondFeature\Middleware\SecondGroupMiddlewareController',
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
