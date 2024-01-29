<?php

namespace Modules\FeatureGroup\SecondFeature\Controllers;

use Hleb\Base\Module;
use Hleb\Constructor\Data\View;

class SecondGroupModuleController extends Module
{
    public function index(): View
    {
        return view("second-group-example");
    }
}
