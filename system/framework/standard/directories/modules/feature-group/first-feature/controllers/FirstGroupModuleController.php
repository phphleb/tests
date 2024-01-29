<?php

namespace Modules\FeatureGroup\FirstFeature\Controllers;

use Hleb\Base\Module;
use Hleb\Constructor\Data\View;

class FirstGroupModuleController extends Module
{
    public function index(): View
    {
        return view("first-group-example");
    }
}
