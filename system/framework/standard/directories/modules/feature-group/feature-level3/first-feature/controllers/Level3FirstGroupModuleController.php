<?php

namespace Modules\FeatureGroup\FeatureLevel3\FirstFeature\Controllers;

use Hleb\Base\Module;
use Hleb\Constructor\Data\View;

class Level3FirstGroupModuleController extends Module
{
    public function index(): View
    {
        return view("first-group-example");
    }
}
