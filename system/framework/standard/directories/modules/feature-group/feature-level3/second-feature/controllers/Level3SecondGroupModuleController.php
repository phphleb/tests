<?php

namespace Modules\FeatureGroup\FeatureLevel3\SecondFeature\Controllers;

use Hleb\Base\Module;
use Hleb\Constructor\Data\View;

class Level3SecondGroupModuleController extends Module
{
    public function index(): View
    {
        return view("second-group-example");
    }
}
