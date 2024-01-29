<?php

namespace Modules\FeatureGroup\SecondFeature\Middleware;

use Hleb\Base\Middleware;

class SecondGroupMiddlewareController extends Middleware
{
    public function index(): void
    {
        echo 'SECOND_GROUP_MIDDLEWARE_';
    }
}
