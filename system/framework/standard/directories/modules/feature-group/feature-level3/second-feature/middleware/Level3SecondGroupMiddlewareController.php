<?php

namespace Modules\FeatureGroup\FeatureLevel3\SecondFeature\Middleware;

use Hleb\Base\Middleware;

class Level3SecondGroupMiddlewareController extends Middleware
{
    public function index(): void
    {
        echo 'SECOND_GROUP_LEVEL3-MIDDLEWARE_';
    }
}
